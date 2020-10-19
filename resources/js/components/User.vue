<template>
    <section>

        <div class="container mt-5">

            <div class="columns">

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


            <div class="buttons is-right">
                <button class="button field is-success" @click="btnNew">
                    <b-icon icon="mdi mdi-account"></b-icon>
                    <span>New User</span>
                </button>

                <button class="button field is-warning" @click="btnEdit">
                    <b-icon icon="mdi mdi-account-edit"></b-icon>
                    <span>Edit User</span>
                </button>

                <button class="button field is-danger" @click="selected = null"
                        :disabled="!selected">
                    <b-icon icon="close"></b-icon>
                    <span>Clear selected</span>
                </button>
            </div>

        </div>




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
            axios.get('/admin-user/api/users')
            .then(function(res){
                return res.data;
            })
            .catch(function(error){
                console.log(error);
            })
            .then(res=>{
                this.total = res.length;
                this.data = res;
                 //alert(res.size);
            })
        },
        onPageChange(page){
            this.page = page;
            this.getStudentList();
        },

        btnNew(){
            window.location = '/admin-user/create';
        },

        btnEdit(){
            window.location = '/admin-user/create';
        },


    }//methods
}
</script>
