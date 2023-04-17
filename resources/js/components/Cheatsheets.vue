<template>
    <div class="container">
        <p class="heading">Шпаргалки</p>
        <p class="description">Используйте поиск, чтобы найти нужную шпаргалку</p>
        <form class="cheats__search" @submit.prevent="findCheats">
            <input class="cheats__input" type="text" placeholder="Найдите нужную шпаргалку..." v-model="search">
            <img class="cheats__img" src="../../images/search.svg" alt="Поиск!" @click="findCheats">
        </form>
<!--        <img class="loading" src="../../images/loading.gif" alt="Loading..." v-if="cheats.length === 0">-->
<!--        <template>-->
            <div class="cheats__container">
                <p v-if="cheats.length === 0">Шпаргалки не найдены 🙁</p>
                <table class="table cheats__table" v-else>
                    <thead>
                        <tr>
                            <td>Название</td>
                            <td>Школьный предмет</td>
                            <td>Открыть</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cheat in cheats" :key="cheat.id">
                            <td class="align-left">{{ cheat.name }}</td>
                            <td>{{ cheat.course }}</td>
                            <td><a :href="cheat.url" target="_blank">Открыть</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
<!--        </template>-->
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            // isLoading: true,
            cheats: [],
            search: ''
        };
    },
    methods: {
        // isEmpty(obj) {
        //     for (let key in obj) return false;
        //     return true;
        // },
        findCheats() {
            this.isLoading = true;
            axios.get('/api/cheatsheets?search=' + this.search)
                .then(response => response.data.data)
                .then(data => {
                    console.log(data)
                    this.cheats = data;
                    // this.isLoading = false;
                })
                .catch(e => {});
        }
    },
    mounted() {
        axios.get('/api/cheatsheets')
            .then(response => response.data.data)
            .then(data => {
                // console.log(data)
                this.cheats = data;
                // this.isLoading = false;
            })
            .catch(e => {});
    }
}
</script>
