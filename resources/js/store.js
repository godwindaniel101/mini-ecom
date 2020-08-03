import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state : {
        adminstat:0,
    },
    getters:{
        adminMode : state =>{
            return ( state.adminstat)
            //for admin moode
        },
    }
})