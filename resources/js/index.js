import axios from "axios";
import {createApp} from "vue/dist/vue.esm-bundler";
import Courses from "./components/Courses.vue";
import News from "./components/News.vue";
import Cheatsheets from "./components/Cheatsheets.vue";

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

createApp(Courses).mount('#courses');

createApp(News).mount('#news');

createApp(Cheatsheets).mount('#cheats');
