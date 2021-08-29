<template>

    <div>  <button class="btn btn-primary ml-3" @click="followUser" v-text="buttonText">  </button></div>
</template>

<script>
export default {
    // props: {userId:String},
    props: ['userId', 'follows'],
    mounted() {
        console.log('component mounted.')
    },
    data: function (){
        return {
            status: this.follows,
        }
    },
    methods: {
        followUser(){
            // alert(this.userId)
            axios.post('/follow/' + this.userId)
                .then(response => {
                    this.status = ! this.status;
                    console.log(response.data);
                })
                .catch(errors => {
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });
        }
    },
    computed: {
        buttonText(){
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
}
</script>

<!--<template>-->
<!--    <div>-->

<!--        &lt;!&ndash;        v-bind:class="!clicked ? 'btn btn-primary' : 'btn btn-light' "&ndash;&gt;-->
<!--        &lt;!&ndash;        class="btn btn-primary ml-4"&ndash;&gt;-->
<!--&lt;!&ndash;        v-bind:class=" {'btn btn-primary': !clicked, 'btn btn-light': clicked}"&ndash;&gt;-->

<!--        <button-->
<!--            v-bind:class=" {'btn btn-primary': !clicked, 'btn btn-light': clicked}"-->
<!--            v-on:click ="clicked = !clicked"-->
<!--            @click="followUser" v-text="buttonText"></button>-->

<!--    </div>-->
<!--</template>-->

<!--&lt;!&ndash; for color change when button clicked "follow" &ndash;&gt;-->
<!--<script>-->
<!--export default {-->
<!--    data: {-->

<!--        clicked: false-->
<!--    }-->
<!--}-->
<!--</script>-->

<!--<script>-->
<!--    export default {-->
<!--        props: ['userId', 'follows'],-->

<!--        mounted() {-->
<!--            console.log('Component mounted.')-->
<!--        },-->

<!--        data:function() {-->
<!--            return {-->
<!--                status: this.follows,-->
<!--            }-->
<!--        },-->

<!--        datta:function() {-->
<!--            return {-->
<!--                clicked: this.follows,-->
<!--            }-->
<!--        },-->

<!--        methods: {-->
<!--            followUser(){-->
<!--                axios.post('/follow/' + this.userId)-->
<!--                    .then(response => {-->
<!--                        this.status = ! this.status;-->
<!--                        console.log(response.data);-->
<!--                 })-->
<!--                .catch(errors => {-->
<!--                    if(errors.response.status == 401) {-->
<!--                        window.location = '/login';-->
<!--                    }-->
<!--                });-->

<!--            }-->
<!--        },-->

<!--        computed: {-->
<!--            buttonText() {-->
<!--                return (this.status) ? 'Unfollow': 'Follow';-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->
