import axios from "axios";
import {createApp} from "vue/dist/vue.esm-bundler";

const Headers = {
  data() {
    return {
      isActiveMenu: false
    };
  },
  methods: {}
};

createApp(Headers).mount('#headers');

function getBodyScrollTop() {
  return self.pageYOffset || (document.documentElement && document.documentElement.scrollTop) || (document.body && document.body.scrollTop);
}

function getScrollTop(elementId) {
  return document.getElementById(elementId).offsetTop;
}

let header = document.getElementById('top_header');

let courses = document.getElementById('courses');
let coursesHeight = courses.offsetHeight;
let coursesOffset = getScrollTop('courses');
let courseLink = document.getElementById('header__link-2');

let news = document.getElementById('news');
let newsHeight = news.offsetHeight;
let newsOffset = getScrollTop('news');
let newLink = document.getElementById('header__link-3');

let cheats = document.getElementById('cheats');
let cheatsHeight = cheats.offsetHeight;
let cheatsOffset = getScrollTop('cheats');
let cheatLink = document.getElementById('header__link-4');

function fixHeader() {
  let differenve = getBodyScrollTop() - getScrollTop('than');

  if(differenve < 0) {
    header.classList.remove('top_header-active');
  } else {
    header.classList.add('top_header-active');
  }
}

function isActiveCourses() {
  let differenve = getBodyScrollTop() - coursesOffset;

  if(differenve >= 0 && differenve < coursesHeight) {
    courseLink.classList.add('header__link-active');
  } else {
    courseLink.classList.remove('header__link-active');
  }
}

function isActiveNews() {
  let differenve = getBodyScrollTop() - newsOffset;

  if(differenve >= 0 && differenve < newsHeight) {
    newLink.classList.add('header__link-active');
  } else {
    newLink.classList.remove('header__link-active');
  }
}

function isActiveCheats() {
  let differenve = getBodyScrollTop() - cheatsOffset;

  if(differenve >= 0 && differenve < cheatsHeight) {
    cheatLink.classList.add('header__link-active');
  } else {
    cheatLink.classList.remove('header__link-active');
  }
}

function init() {
  fixHeader();
  isActiveCourses();
  isActiveNews();
  isActiveCheats();
}

document.addEventListener('scroll', function() {
  if(document.documentElement.clientWidth >= 721) init();
  else fixHeader();
});

init();



setInterval(() => {
  let iframe = document.getElementById("iframe");
  iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
}, 1000);

createApp({
    data() {
        return {
            isLoading: true,
            courses: null,
            activeCourse: null
        };
    },
    methods: {
        showCourse(i) {
            this.activeCourse = this.courses[i];

            setTimeout(() => {
                let iframe = document.getElementById("iframe");
                iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
            }, 400);
        }
    },
    mounted() {
        let _this = this;
        axios.get('/api/courses')
            .then(function(response) {
                _this.courses = response.data;
                _this.isLoading = false;
                _this.showCourse(0);
            });
    }
}).mount('#courses');

createApp({
    data() {
        return {
            isLoading: true,
            news: null,
            activeNews: 3
        };
    },
    methods: {
        parseMyDate(date) {
            let d = new Date(date);

            let newDate = d.getDate() + '/' + (d.getMonth() + 1) + '/' + d.getFullYear() + ' ' + d.getHours() + ':' + d.getMinutes();

            return newDate;
        }
    },
    mounted() {
        let _this = this;
        axios.get('/api/news')
            .then(function(response) {
                _this.news = response.data;
                _this.isLoading = false;
            });
    }
}).mount('#news');

createApp({
    data() {
        return {
            isLoading: true,
            cheats: null,
            search: ''
        };
    },
    methods: {
        isEmpty(obj) {
            for (let key in obj) return false;
            return true;
        },
        findCheats() {
            this.isLoading = true;
            let _this = this;
            axios.post('/api/cheats', { search: this.search })
                .then(function(response) {
                    _this.cheats = response.data;
                    _this.isLoading = false;
                });
        }
    },
    mounted() {
        let _this = this;
        axios.get('/api/cheats')
            .then(function(response) {
                _this.cheats = response.data;
                _this.isLoading = false;
            });
    }
}).mount('#cheats');
