<template>

    <div class="container mt-5 is-6">

        <div class="columns">
            <div class="column is-8-desktop is-offset-2-desktop">

                <div class="panel is-success">
                    <div class="panel-heading">
                        User Information
                    </div>


                    <div class="container">
                        <div class="columns">
                            <div class="column">
                                <b-field label="Username">
                                    <b-input icon-pack="fa"
                                             v-model="username"
                                             name="username"
                                             icon="user"
                                             type="passwordType"
                                             message="passwordMsg"
                                             autocomplete="off" required>
                                    </b-input>
                                </b-field>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <b-field label="Password">
                                    <b-input icon-pack="fa"
                                             v-model="password"
                                             name="password"
                                             type="passwordType"
                                             message="passwordMsg"
                                             icon="lock"
                                             autocomplete="off" required
                                    @blur="matchPassword">
                                    </b-input>
                                </b-field>
                            </div>

                            <div class="column">
                                <b-field label="Retype Password">
                                    <b-input icon-pack="fa"
                                             v-model="rpassword"
                                             name="rpassword"
                                             type="rpasswordType"
                                             message="rpasswordMsg"
                                             icon="lock"
                                             autocomplete="off" required>
                                    </b-input>
                                </b-field>
                            </div>
                        </div><!--columns-->

                        <div class="columns">
                            <div class="column">
                                <b-field label="Lastname">
                                    <b-input icon-pack="fa"
                                             v-model="lname"
                                             name="lname"
                                             icon="user"
                                             autocomplete="off" required>
                                    </b-input>
                                </b-field>
                            </div>

                            <div class="column">
                                <b-field label="Firstname">
                                    <b-input icon-pack="fa"
                                             v-model="fname"
                                             name="fname"
                                             icon="user"
                                             autocomplete="off" required>
                                    </b-input>
                                </b-field>
                            </div>

                            <div class="column">
                                <b-field label="Middlename">
                                    <b-input icon-pack="fa"
                                             v-model="mname"
                                             name="mname"
                                             icon="user"
                                             autocomplete="off">
                                    </b-input>
                                </b-field>
                            </div>
                        </div><!--columns-->


                        <div class="columns">
                            <div class="column">
                                <b-field label="Sex">
                                    <b-select v-model="sex" icon-pack="fa" icon="venus" expanded>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                    </b-select>
                                </b-field>
                            </div>

                            <div class="column">
                                <b-field label="Role">
                                    <b-select v-model="role" expanded>
                                        <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                        <option value="STAFF">STAFF</option>
                                    </b-select>
                                </b-field>
                            </div>

                            <div class="column">
                                <b-field label="Office">
                                    <b-select v-model="office" expanded>
                                        <option v-for="item in offices" :key="item.id" :value="item.office_code.toUpperCase()">{{ item.office_code.toUpperCase() }}</option>
                                    </b-select>
                                </b-field>
                            </div>

                        </div><!--columns-->

                        <div class="columns">

                            <div class="column">
                                <b-field label="Email">
                                    <b-input icon-pack="fa"
                                             v-model="email"
                                             name="email"
                                             icon="envelope"
                                             autocomplete="off">
                                    </b-input>
                                </b-field>
                            </div>

                            <div class="column">
                                <b-field label="Contact No">
                                    <b-input icon-pack="fa"
                                             v-model="contactNo"
                                             name="contactNo"
                                             icon="mobile"
                                             autocomplete="off">
                                    </b-input>
                                </b-field>
                            </div>

                        </div>

                        <div class="buttons is-right">
                            <button class="button is-success">
                                <span><i class="fa fa-check"></i></span>
                                <span>SAVE</span>
                            </button>
                        </div>


                    </div><!--container-->
                </div><!--panel-->

            </div> <!--column-->
        </div><!--columns-->
    </div><!--container-->







</template>

<script>
export default {
    data(){
        return{
            username: '',
            password: '',
            passwordType: '',
            passwordMsg: '',

            rpassword: '',
            rpasswordType: '',
            rpasswordMsg: '',

            lname: '',
            fname:'',
            mname:'',
            sex:'',
            email:'',
            contactNo:'',

            roles:[],
            role:'',

            offices:[],
            office:'',

        }
    },

    methods: {

        getOffices:function(){
            axios('/admin-user/api/offices')
            .then(function(res){return res.data})
            .catch(function(err){
                console.log(err)
            })
            .then(res=>{
                this.offices = res;
            })
        },

        matchPassword:function(){
            return '';
        }
    },

    mounted() {
        this.getOffices();
    },

}
</script>

<style scoped>


</style>
