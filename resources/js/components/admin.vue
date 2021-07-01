<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card p-0 d-block d-md-none">
                    <div class="card-body">

                        <ul class="list-group border-0 d-inline">
                            <li v-for="(item, index) in links" style="display: inline-block;" :key="index" class="list-group-item p-0 border-0">
                                <router-link class="btn d-block text-left p-2 hoverable border-bottom " :to="item.to">
                                    <i :class="item.icon" aria-hidden="true"></i></router-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card p-0 d-none d-md-block">
                    <div class="card-body">

                        <ul class="list-group border-0">
                            <li v-for="(item, index) in links" :key="index"
                             :class="`list-group-item p-0 border-0
                             ${($router.history.current.path == item.to) ? 'active' :''} `">

                                <router-link class="btn d-block text-left p-2 hoverable border-bottom " :to="item.to">
                                    <i :class="item.icon" aria-hidden="true"></i> {{ item.name}}</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-capitalize"> {{ ($router.history.current.path.slice(1)) ? $router.history.current.path.slice(1) :"Dahboard"}} </h3>
                    </div>

                    <div class="card-body px-0">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                links:[
                    {
                        to:'/dashboard',
                        name:'Dashboard',
                        icon:'fa fa-dashboard',
                    },
                    {
                        to:'/user',
                        name:'User',
                        icon:'fa fa-user',
                    },
                    {
                        to:'/result',
                        name:'Result',
                        icon:'fa fa-book',
                    },
                    {
                        to:'/news',
                        name:'Daily News',
                        icon:'fa fa-newspaper-o',
                    },
                    {
                        to:'/contact',
                        name:'Contact Us',
                        icon:'fa fa-phone',
                    },
                ],
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style lang="scss">
    .hoverable:hover
    {
        color:rgb(247, 188, 60);
        background: rgb(76, 90, 125) !important;
    }
    .active{
        color:rgb(247, 188, 60);
        background: rgb(76, 90, 125) !important;
    }
</style>
