<template>
    <div class="flex flex-col gap-4">
        <template v-for="task in tasks" :key="task.id">
            <form action="" method="POST" @submit="check">
                <div class="select-none">
                    <p class="text-lg font-medium">{{ task.name }}</p>
                    <template v-if="task.type === TaskType.One">
                        <ul class="flex flex-col gap-1 mt-1">
                            <li v-for="(option, index) in task.options" :key="index">
                                <label class="cursor-pointer flex gap-2 items-center" :for="'task-' + index + '-' + task.id">
                                    <input :id="'task-' + index + '-' + task.id" type="radio" :name="task.id" :value="option.text">
                                    {{ option.text }}
                                </label>
                            </li>
                        </ul>
                    </template>
                    <template v-else-if="task.type === TaskType.Many">
                        <ul class="flex flex-col gap-1 mt-1">
                            <li v-for="(option, index) in task.options" :key="index">
                                <label class="cursor-pointer flex gap-2 items-center" :for="'task-' + index + '-' + task.id">
                                    <input :id="'task-' + index + '-' + task.id" type="checkbox" :name="task.id" :value="option.text">
                                    {{ option.text }}
                                </label>
                            </li>
                        </ul>
                    </template>
                    <template v-else-if="task.type === TaskType.Input">
                        <input class="w-full rounded text-sm mt-1 px-3 py-2" type="text" :name="task.id">
                    </template>
                    <button
                        class="mt-2 block bg-indigo-500 hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 rounded px-3 py-2 uppercase text-xs text-white font-bold"
                        type="submit"
                    >Проверить</button>
                </div>
            </form>
        </template>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import { idGenerator } from "../../../utils";
import axios from "axios";

enum TaskType {
    One = '1',
    Many = '2',
    Input = '3',
}

interface Task {
    id: number,
    part_id?: number,
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

        const check = function (event: SubmitEvent): void {
            event.preventDefault();
            let formData = new FormData(<HTMLFormElement>event.target);

            let answer: any[] = [];
            let task: number = 0;
            formData.forEach((value, key) => {
                answer.push(value);
                task = Number(key);
            });

            if (answer.length === 0) {
                alert('Выберите значение!');
                return;
            }
            // console.log({
            //     'answer': answer,
            //     'task_id': task
            // })

            axios.post('/api/check', {
                    'answer': answer,
                    'task_id': task
                })
                // .then(response => {
                //     console.log(response)})
                .then(response => response.data)
                .then(data => {
                    if (data.correct) {
                        alert('Правильный ответ!');
                    } else {
                        alert('Неправильный ответ!')
                    }
                    // console.log(data);
                }).catch(error => {
                    console.log(error);
                });
            // console.log(event);
            // console.log(formData);
        };
        // const taskIdGenerator = idGenerator();
        // const optionIdGenerator = idGenerator();
        //
        // const createTask = function (): void {
        //     tasks.value.push({
        //         id: taskIdGenerator(),
        //         part_id: Number(insert?.dataset.partId || 0),
        //         type: TaskType.One,
        //         name: '',
        //         scores: 0,
        //         options: [],
        //         correct: []
        //     });
        // };
        //
        // const createTaskOption = function (index: number): void {
        //     tasks.value[index].options.push({
        //         id: optionIdGenerator(),
        //         text: ''
        //     });
        // }
        //
        // const toggleTaskOption = function (index: number, id: number): void {
        //     if (tasks.value[index].type === TaskType.Many) {
        //         if (tasks.value[index].correct.includes(id)) {
        //             tasks.value[index].correct.splice(tasks.value[index].correct.indexOf(id), 1)
        //         } else {
        //             tasks.value[index].correct.push(id);
        //         }
        //     } else if (tasks.value[index].type === TaskType.One) {
        //         tasks.value[index].correct = [id];
        //     }
        // }
        //
        // const deleteTaskOption = function (index: number, id: number): void {
        //     if (tasks.value[index].correct.includes(id)) {
        //         tasks.value[index].correct.splice(tasks.value[index].correct.indexOf(id), 1)
        //     }
        //     tasks.value[index].options.splice(tasks.value[index].options.findIndex(option => option.id === id), 1);
        // }

        return {
            tasks,
            taskTypes,
            // createTask,
            TaskType,
            check
            // createTaskOption,
            // toggleTaskOption,
            // deleteTaskOption
        };
    }
})
</script>
