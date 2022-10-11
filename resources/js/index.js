import axios from "axios";
import {createApp} from "vue/dist/vue.esm-bundler";

import.meta.glob(['../images/**']);

window.onload = function () {
    let preloader = document.getElementById('preloader');

    setTimeout(() => preloader.classList.add('loaded'), 500);
    setTimeout(() => preloader.remove(), 800);
};

createApp({
    data() {
        return {
            isActiveMenu: false
        };
    },
    methods: {}
}).mount('#headers');

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

    if (differenve < 0) {
        header.classList.remove('top_header-active');
    } else {
        header.classList.add('top_header-active');
    }
}

function isActiveCourses() {
    let differenve = getBodyScrollTop() - coursesOffset;

    if (differenve >= 0 && differenve < coursesHeight) {
        courseLink.classList.add('header__link-active');
    } else {
        courseLink.classList.remove('header__link-active');
    }
}

function isActiveNews() {
    let differenve = getBodyScrollTop() - newsOffset;

    if (differenve >= 0 && differenve < newsHeight) {
        newLink.classList.add('header__link-active');
    } else {
        newLink.classList.remove('header__link-active');
    }
}

function isActiveCheats() {
    let differenve = getBodyScrollTop() - cheatsOffset;

    if (differenve >= 0 && differenve < cheatsHeight) {
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

document.addEventListener('scroll', function () {
    if (document.documentElement.clientWidth >= 721) init();
    else fixHeader();
});

init();


setInterval(() => {
    let iframe = document.querySelector('#iframe');
    // console.log(iframe);
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
        axios.get('/api/courses')
            .then(response => {
                this.courses = response.data;
                this.isLoading = false;
                this.showCourse(0);
            })
            .catch(e => {
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
        axios.get('/api/news')
            .then(response => {
                this.news = response.data;
                this.isLoading = false;
            })
            .catch(e => {
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
            axios.post('/api/cheats', {search: this.search})
                .then(response => {
                    this.cheats = response.data;
                    this.isLoading = false;
                })
                .catch(e => {
                });
        }
    },
    mounted() {
        axios.get('/api/cheats')
            .then(response => {
                this.cheats = response.data;
                this.isLoading = false;
            })
            .catch(e => {
            });
    }
}).mount('#cheats');
