<template>
    <div class="grid grid-cols-6 gap-4">
        <button
            class="flex w-full col-span-full justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
            type="button"
            @click="createTask"
        >Создать задание</button>

        <template v-for="(task, index) in tasks" :key="task.id">
            <div class="col-span-full space-y-2">
                <div
                    class="flex items-center"
                    v-for="(description, key) in taskTypes"
                    :key="key"
                >
                    <input :id="'type-' + task.id + '-' + key" :name="'type-' + task.id" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" :value="key" v-model="tasks[index].type" @change="tasks[index].correct = []">
                    <label :for="'type-' + task.id + '-' + key" class="ml-2 block text-sm font-medium text-gray-700">{{ description }}</label>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-5">
                <label class="block text-sm font-medium text-gray-700" for="name">Вопрос, на который нужно дать ответ:</label>
                <input id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" autocomplete="off" v-model="tasks[index].name" required>
            </div>

            <div class="col-span-6 sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700" for="scores">Награда:</label>
                <input id="scores" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="number" min="0" step="1" autocomplete="off" v-model="tasks[index].scores" required>
            </div>

            <template v-if="tasks[index].type === TaskType.One || tasks[index].type === TaskType.Many">
                <div class="col-span-6" v-for="(option, i) in tasks[index].options" :key="option.id">
                    <label :for="'option' + option.id" class="block text-sm font-medium text-gray-700">Вариант ответа №{{ i + 1 }}:</label>

                    <div class="flex gap-2">
                        <input
                            :id="'option' + option.id"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            :class="{ 'ring-1 ring-green-600': tasks[index].correct.includes(option.id) }"
                            type="text"
                            autocomplete="off"
                            v-model="tasks[index].options[i].text"
                            required
                        >
                        <button
                            class="flex-none justify-center py-1 px-4 mt-1 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                            type="button"
                            @click="toggleTaskOption(index, option.id)"
                        >Ответ</button>
                        <button
                            class="flex-none justify-center py-1 px-4 mt-1 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            type="button"
                            @click="deleteTaskOption(index, option.id)"
                        >Удалить</button>
                    </div>

                </div>

                <button
                    class="flex w-full col-span-full justify-center py-1 px-4 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500"
                    type="button"
                    @click="createTaskOption(index)"
                >Добавить вариант ответа</button>
            </template>
            <template v-else-if="tasks[index].type === TaskType.Input">
                <div class="col-span-6">
                    <label class="block text-sm font-medium text-gray-700" for="correct">Правильный ответ на вопрос:</label>
                    <input id="correct" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" autocomplete="off" v-model="tasks[index].correct[0]" required>
                </div>
            </template>
        </template>

        <input type="hidden" name="tasks" :value="JSON.stringify(tasks)">
<!--        <textarea class="col-span-full text-sm" rows="3" @input="tasks = JSON.parse($event.target.value)">{{ JSON.stringify(tasks) }}</textarea>-->
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import { idGenerator } from "../../../utils";

enum TaskType {
    One = '1',
    Many = '2',
    Input = '3',
}

interface Task {
    id: number,
    part_id: number,
    type: TaskType,
    name: string,
    scores: number,
    options: TaskOption[],
    correct: number[]
}

interface TaskOption {
    id: number,
    text: string
}

export default defineComponent({
    setup() {
        const insert = document.querySelector<HTMLDivElement>('#insert');
        const tasks = ref<Task[]>(JSON.parse(insert?.dataset.tasks || '[]'));
        const taskTypes = {
            [TaskType.One]: 'Выбор одного ответа из нескольких вариантов',
            [TaskType.Many]: 'Выбор нескольких ответов из множества вариантов',
            [TaskType.Input]: 'Ввод произвольного значения в поле для ввода'
        };
        const taskIdGenerator = idGenerator();
        const optionIdGenerator = idGenerator();

        const createTask = function (): void {
            tasks.value.push({
                id: taskIdGenerator(),
                part_id: Number(insert?.dataset.partId || 0),
                type: TaskType.One,
                name: '',
                scores: 0,
                options: [],
                correct: []
            });
        };

        const createTaskOption = function (index: number): void {
            tasks.value[index].options.push({
                id: optionIdGenerator(),
                text: ''
            });
        }

        const toggleTaskOption = function (index: number, id: number): void {
            if (tasks.value[index].type === TaskType.Many) {
                if (tasks.value[index].correct.includes(id)) {
                    tasks.value[index].correct.splice(tasks.value[index].correct.indexOf(id), 1)
                } else {
                    tasks.value[index].correct.push(id);
                }
            } else if (tasks.value[index].type === TaskType.One) {
                tasks.value[index].correct = [id];
            }
        }

        const deleteTaskOption = function (index: number, id: number): void {
            if (tasks.value[index].correct.includes(id)) {
                tasks.value[index].correct.splice(tasks.value[index].correct.indexOf(id), 1)
            }
            tasks.value[index].options.splice(tasks.value[index].options.findIndex(option => option.id === id), 1);
        }

        return {
            tasks,
            taskTypes,
            createTask,
            TaskType,
            createTaskOption,
            toggleTaskOption,
            deleteTaskOption
        };
    }
})
</script>
