<template>
    <div class="col-span-6">
        <label for="course_id" class="block text-sm font-medium text-gray-700">Курс:</label>
        <select id="course_id" name="course_id" v-model="form.course" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="" disabled>Выберите курс</option>
            <option v-for="(course, id) in courses" :key="id" :value="id">{{ course.name }}</option>
        </select>
    </div>

    <div v-if="form.course !== ''" class="col-span-6 space-y-2">
        <div class="flex items-center" v-for="part in parts" :key="part">
            <input :id="'part-' + part" name="part" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" :value="part" v-model="form.part">
            <label :for="'part-' + part" class="ml-2 block text-sm font-medium text-gray-700">Задание из {{ part }}-й части</label>
        </div>
    </div>

    <div class="col-span-6 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700" for="task">Заголовок модуля:</label>
        <input id="task" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" v-model="form.task" placeholder="1 задание" name="task" required>
    </div>

    <div class="col-span-6 sm:col-span-4">
        <label class="block text-sm font-medium text-gray-700" for="description">Краткое описание модуля:</label>
        <input id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" v-model="form.description" placeholder="Главная информация в тексте" name="description" required>
    </div>
</template>

<script>
import {onMounted, ref, reactive, computed} from "vue";
import axios from "axios";

export default {
    setup() {
        const insert = document.querySelector('#insert');
        const courses = reactive({});
        const form = reactive({
            course: insert.dataset.course,
            part: +insert.dataset.part,
            task: insert.dataset.task,
            description: insert.dataset.description
        });
        const parts = computed(() => courses[form.course]?.parts);

        onMounted(() => {
            axios.get('/api/courses')
                .then(response => response.data.data)
                .then(data => {
                    for (const course of data)
                        courses[course.id] = course;
                })
                .catch(e => {
                    console.log(e)
                });
        });

        return {
            courses,
            form,
            parts
        };
    }
}
</script>
