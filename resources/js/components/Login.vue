<template>

    <div class="container mt-5">
        <div class="columns">
            <div class="column is-6 is-offset-3">


                <div class="panel is-success">
                    <div class="panel-heading">
                        GADTC INVENTORY SYSTEM SECURITY CHECK
                    </div>

                    <form id="checkForm" method="POST" action="/login">

                        <div class="panel-block">
                            <div class="container">
                                <div class="column">
                                    <b-field label="Username">
                                        <b-input placeholder="Username"
                                            icon-pack="fa"
                                            icon="user"
                                            name="username"
                                            required
                                            autocomplete="off">
                                        </b-input>
                                    </b-field>
                                </div>
                                
                                <div class="column">
                                    <b-field label="Password">
                                        <b-input type="password"
                                            placeholder="Password"
                                            name="password"
                                            password-reveal
                                            autocomplete="off"
                                            required>
                                        </b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <!-- <b-button expanded type="submit" class="is-success">LOGIN</b-button>-->
                                    <button type="submit" class=" button is-fullwidth is-success">LOGIN</button>
                                </div>
                            </div><!--container-->
                        </div><!--panel block-->
                        <input type="hidden" name="_token" :value="csrf">
                    </form>
                </div><!--panel-->



            </div><!--offset 4-->

    
        </div>
    </div>
   
</template>

<script>
    export default {

        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },

    }
</script>
