<template>
    <div class="container">
        <p class="heading">Доступные курсы</p>
        <p class="description">Список курсов, которые Вы можете почитать</p>
        <img class="loading" src="../../images/loading.gif" alt="Loading..." v-if="courses.length === 0">
        <div class="courses__row" v-else>
            <div>
                <div class="courses__left">
                    <ul class="courses__list">
                        <li v-for="(course, index) in courses" :key="course.id" @click="activeCourseIndex = index" :class="{ 'courses__subject-active': course.name === courses[activeCourseIndex].name }"><span>»</span>{{ course.name }}</li>
                    </ul>
                </div>
            </div>

            <div class="courses__right">
                <div class="courses__title">{{ courses[activeCourseIndex].name }}</div>
                <div class="courses__body">
                    <p class="courses__course_description">{{ courses[activeCourseIndex].description }}</p>
                    <p class="courses__course_part">1 часть</p>
                    <div class="courses__lessons">
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>1 задание: </strong>главная информация в тексте</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>2 задание: </strong>главная информация в тексте</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>3 задание: </strong>главная информация в тексте</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>4 задание: </strong>главная информация в тексте</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>5 задание: </strong>главная информация в тексте</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>6 задание: </strong>главная информация в тексте</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>7 задание: </strong>главная информация в тексте</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>8 задание: </strong>главная информация в тексте</a>
                    </div>
                    <p class="courses__course_part">2 часть</p>
                    <div class="courses__lessons">
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>27 задание: </strong>вступление</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>27 задание: </strong>комментарий</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>27 задание: </strong>мнение автора</a>
                        <a class="courses__lesson" href="https://teoschool.ru/courses/math/svoystva-chisel" target="_top"><strong>27 задание: </strong>своё мнение</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            courses: [],
            activeCourseIndex: 0
        };
    },
    mounted() {
        axios.get('/api/courses')
            .then(response => response.data.data)
            .then(data => {
                this.courses = data;
            })
            .catch(e => {});
    }
}
</script>

<style>
a {
    color: #373F41;
    text-decoration: none;
    font: inherit;
}

.courses__course_description {
    font-size: 16px;
    letter-spacing: 0.2px;
    line-height: 24px;
    font-weight: 500;
}

.courses__course_part {
    font-size: 18px;
    letter-spacing: 0.2px;
    line-height: 24px;
    font-weight: 600;
    margin-top: 32px;
    margin-bottom: 16px;
}

.courses__lessons {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 16px;
    grid-auto-rows: minmax(80px, auto);
}

.courses__lesson {
    background: linear-gradient(120.41deg, rgba(255, 170, 133, 0.8) 15.75%, rgba(255, 82, 229, 0.8) 81.65%);
    padding: 10px 16px;
    border-radius: 10px;
    border: 1px solid #373F41;
    font-size: 14px;
    line-height: 16px;
    letter-spacing: 0.2px;
    font-weight: 500;
}

.courses__lesson:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

@media screen and (max-width: 580px) and (min-width: 451px) {
    .courses__lessons {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media screen and (max-width: 450px) and (min-width: 351px) {
    .courses__lessons {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (max-width: 350px) and (min-width: 0) {
    .courses__lessons {
        grid-template-columns: repeat(1, 1fr);
    }

    .courses__course_description {
        font-size: 14px;
    }
}
</style>
