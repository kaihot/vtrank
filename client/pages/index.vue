<template>
    <div>
        <v-breadcrumbs>
            <v-icon slot="divider">chevron_right</v-icon>
            <v-breadcrumbs-item
                    v-for="item in items"
                    :key="item.text"
                    :disabled="item.disabled"
            >
                {{ item.text }}
            </v-breadcrumbs-item>
        </v-breadcrumbs>
        
        <v-tabs
                slot="extension"
                v-model="model"
                centered
                slider-color="indigo"
        >
            <v-tab :href="`#tab-1`">
                今日
            </v-tab>
            <v-tab :href="`#tab-2`">
                今週
            </v-tab>
            <v-tab :href="`#tab-3`">
                今月
            </v-tab>
        </v-tabs>
        <v-tabs-items v-model="model">
            <v-tab-item
                    v-for="i in 3"
                    :key="i"
                    :id="`tab-${i}`"
            >
                <v-list three-line>
                    <template v-for="(item, index) in items">
                        <v-list-tile :key="index" avatar>
                            <v-list-tile-avatar>

                            </v-list-tile-avatar>
                            <v-list-tile-avatar>
                                <img :src="item.avatar">
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title v-html="item.title"></v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </template>
                </v-list>
            </v-tab-item>
        </v-tabs-items>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                drawer: null,
                text: "a",
                model: 'tab-2',
                items: [
                    { text: "aaa", avatar: '/static/doc-images/lists/1.jpg', title: 'Brunch this weekend?', subtitle: "<span class='text--primary'>Ali Connors</span>asd" },
                    { text: "bbb", avatar: '/static/doc-images/lists/1.jpg', title: 'Brunch this weekend?', subtitle: "<span class='text--primary'>Ali Connors</span>asd" },
                    { text: "aaccca", avatar: '/static/doc-images/lists/1.jpg', title: 'Brunch this weekend?', subtitle: "<span class='text--primary'>Ali Connors</span>asd" },
                ]
            }
        }
    }
</script>

<style>

</style>
