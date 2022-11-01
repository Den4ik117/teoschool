<template>
    <div class="flex flex-col gap-4">
        <template v-for="task in tasks" :key="task.id">
            <template v-if="task.type === TaskType.One">
                <div class="">
                    <p>{{ task.name }}</p>
                    <ul>
                        <li v-for="(option, index) in task.options" :key="key">
                            <label :for="'task-' + index + '-' + task.id">
                                <input :id="'task-' + index + '-' + task.id" type="radio" :name="'task-' + task.id">
                                {{ option.text }}
                            </label>
                        </li>
                    </ul>
                    <button class="mt-1 bg-indigo-500 rounded px-3 py-2 uppercase text-xs text-white font-bold">Проверить</button>
                </div>
            </template>
            <template v-else-if="task.type === TaskType.Many">
                <div class="">
                    <p>{{ task.name }}</p>
                    <ul>
                        <li v-for="(option, index) in task.options" :key="key">
                            <label :for="'task-' + index + '-' + task.id">
                                <input :id="'task-' + index + '-' + task.id" type="checkbox" :name="'task-' + task.id">
                                {{ option.text }}
                            </label>
                        </li>
                    </ul>
                    <button class="mt-1 bg-indigo-500 rounded px-3 py-2 uppercase text-xs text-white font-bold">Проверить</button>
                </div>
            </template>
            <template v-else-if="task.type === TaskType.Input">
                <div class="">
                    <p>{{ task.name }}</p>
                    <input type="text" :name="'task-' + task.id">
                    <button class="mt-1 block bg-indigo-500 rounded px-3 py-2 uppercase text-xs text-white font-bold">Проверить</button>
                </div>
            </template>
        </template>
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
            // createTaskOption,
            // toggleTaskOption,
            // deleteTaskOption
        };
    }
})
</script>
