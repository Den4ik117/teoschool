const { default: axios } = require("axios");

Vue.createApp({
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

Vue.createApp({
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

Vue.createApp({
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
