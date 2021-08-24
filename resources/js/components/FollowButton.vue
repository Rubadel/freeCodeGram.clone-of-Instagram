<template>
    <div>

        <!--        v-bind:class="!clicked ? 'btn btn-primary' : 'btn btn-light' "-->
        <!--        class="btn btn-primary ml-4"-->

        <button
            v-bind:class=" {'btn btn-primary': !clicked, 'btn btn-light': clicked}"
            v-on:click ="clicked = !clicked"
            @click="followUser" v-text="buttonText"></button>

    </div>
</template>

<!-- for color change when button clicked "follow" -->

<!--<script>-->
<!--export default {-->
<!--    data: {-->

<!--        clicked: false-->
<!--    }-->

<!--}-->
<!--</script>-->

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data:function() {
            return {
                status: this.follows,
                clicked: this.follows,
            }
        },
        methods: {
            followUser(){
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                 })
                .catch(errors => {
                    if(errors.response.status == 401) {
                        window.location = '/login';
                    }
                });

            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
