<template>
    <div>filter user: <select name="user" v-model="user">
        <option value="-">kies een gebruiker</option>
        <option v-for="(user, index) in users()" :value="user">{{user}}</option>
    </select>
        <ul>
            <Message v-for="(message, index) in filterMessages.slice().reverse()" :message="message" :index="index"
                     :key="index"/>
        </ul>
    </div>
</template>

<script>
    import Message from './Message.vue';

    export default {

        components: {
            Message
        },
        data: function() {
            return {
                user: '-'
            }
        },
        props: {
            messages: Array
        },
        computed: {
            filterMessages() {
                return this.user === '-' ? this.messages : this.messages.filter(message => message.user === this.user);
            }
        },
        methods: {
            users: function () {
                let users = [];
                this.messages.forEach(function (value) {
                    if (users.indexOf(value.user) === -1) {
                        users.push(value.user);
                    }
                });
                return users;
            }

        }

    }
</script>

<style scoped>
    ul {
        padding: 0 10px 10px 10px;
    }
</style>
