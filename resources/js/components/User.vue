<template>
    <section>

        <div class="container mt-5">

            <div class="columns">
                <div class="column">
                    <button class="button field is-danger" @click="selected = null"
                        :disabled="!selected">
                        <b-icon icon="close"></b-icon>
                        <span>Clear selected</span>
                    </button>

                    <button class="button field is-success" @click="functionClick">
                        <b-icon icon="mdi mdi-account"></b-icon>
                        <span>New User</span>
                    </button>

                    <button class="button field is-warning" @click="functionClick">
                        <b-icon icon="mdi mdi-account-edit"></b-icon>
                        <span>Edit User</span>
                    </button>
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <b-table :data="data" :columns="columns"
                        :selected.sync="selected" 
                        focusable
                        :loading="loading"
                        :paginated="isPaginated"
                        :per-page="perPage"
                        sort-icon="arrow-up"
                        backend-pagination
                        :total="total"
                        @page-change="onPageChange"
                        @dblclick="isCardModalActive=true"
                        aria-next-label="Next page"
                        aria-previous-label="Previous page"
                        aria-page-label="Page"
                        aria-current-label="Current page">
                    </b-table>
                </div>
            </div>


            <div class="columns mt-2">
                <div class="column">
                    <pre>{{ selected }}</pre>
                </div>
            </div>
        </div>

        <!-- <b-modal v-model="isCardModalActive" :width="640" scroll="keep">
           <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="/static/img/placeholder-1280x960.png" alt="Image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="/static/img/placeholder-1280x960.png" alt="Image">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">John Smith</p>
                            <p class="subtitle is-6">@johnsmith</p>
                        </div>
                    </div>

                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                        <a>#css</a> <a>#responsive</a>
                        <br>
                        <small>11:09 PM - 1 Jan 2016</small>
                    </div>
                </div>
            </div>
        </b-modal> -->


        
    </section><!--root section-->
</template>

<script>

export default {
    data(){
        const data = []
        return {
            isCardModalActive : false,
            isPaginated: true,
            loading: false,
            page: 1,
            total: 0,
            perPage: 10,
            data,
            selected: data[1],
            columns: [
                {
                    field: 'id',
                    label: 'ID',
                    width: '40',
                    numeric: true,
                    sortable: true,
                    
                },
                {
                    field: 'username',
                    label: 'Username',
                    searchable: true
                },
                {
                    field: 'lname',
                    label: 'Lastname',
                    searchable: true
                },
                {
                    field: 'fname',
                    label: 'Firstname',
                    searchable: true
                },
                {
                    field: 'mname',
                    label: 'Middlename'
                },
                {
                    field: 'role',
                    label: 'Role'
                }
            ]
        }
    },//data

    mounted(){
        this.getUserList();
    },//mounted

    methods:{
        getUserList(){
            axios.get('api/users')
            .then(function(res){
                return res.data;
            })
            .catch(function(error){
                console.log(error);
            })
            .then(res=>{
                this.total = res.length;
                this.data = res;

                 alert(res);
            })
        },
        onPageChange(page){
            this.page = page;
            this.getStudentList();
        },


    }//methods
}
</script>