<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <ul>
                    <li v-for="task in tasks">{{ task }}</li>
                </ul>
            </div>
            <div class="col-12">
                <form @submit.prevent="submitHandler">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Todo text</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               v-model="newTask" placeholder="Enter Todo">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [],
                newTask: ''
            }
        },
        created() {
            window.Echo.channel('task-created').listen('TaskCreatedEvent', e =>  {
                this.tasks.push(e.task.body)
            });

            axios.get('/api/tasks')
                .then(res => {
                    this.tasks = res.data
                })
        },
        methods: {
            submitHandler() {
                axios.post('/api/tasks', {body: this.newTask});

                this.tasks.push(this.newTask);
                this.newTask = '';
            }
        }
    }
</script>
