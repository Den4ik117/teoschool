<template>
    <div class="container">
        <p class="heading">Последние новости</p>
        <p class="description">Подпишитесь на нашу новостную рассылку ниже и будьте в курсе последних новостей!</p>
        <img class="loading" src="../../images/loading.gif" alt="Loading..." v-if="news.length === 0">
        <div class="news__row" v-else>
            <template v-for="information in visibleNews" :key="information.id">
                <a class="news__article" :href="'/information/' + information.id">
                    <img class="news__image" :src="information.image" alt="Изображение новости">
                    <div class="news__content">
                        <p class="news__title">{{ information.title }}</p>
                        <p class="news__description">{{ information.content }}</p>
                        <div class="news__date">
                            <img src="../../images/calendar.svg" alt="•">
                            <p>{{ information.published_at }}</p>
                        </div>
                    </div>
                </a>
            </template>
        </div>
        <a v-if="activeNews < news.length" href="javascript:void(0)" class="button button-transparent" v-on:click.prevent="activeNews += 3">Показать ещё</a>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            news: [],
            activeNews: 3
        };
    },
    computed: {
        visibleNews() {
            return this.news.slice(0, this.activeNews);
        }
    },
    mounted() {
        axios.get('/api/information')
            .then(response => response.data.data)
            .then(data => {
                this.news = data;
            })
            .catch(e => {});
    }
}
</script>
