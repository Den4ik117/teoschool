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
                    <template v-for="part in courses[activeCourseIndex].parts">
                        <p class="courses__course_part">{{ part }} часть</p>
                        <div class="courses__lessons">
                            <template v-for="module in courses[activeCourseIndex].modules" :key="module.id">
                                <a
                                    v-if="part === module.part"
                                    class="courses__lesson"
                                    :href="'/dashboard/modules/' + module.id"
                                    v-html="module.title"
                                ></a>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { ref, onMounted } from "vue";

export default {
    setup() {
        const courses = ref([]);
        const activeCourseIndex = ref(0);

        onMounted(() => {
            axios.get('/api/courses')
                .then(response => response.data.data)
                .then(data => {
                    courses.value = data;
                })
                .catch(e => {
                    console.log(e)
                });
        });

        return {
            courses,
            activeCourseIndex
        };
    }
}
</script>
