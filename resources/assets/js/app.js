/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Form from './utils/Form'

require('./bootstrap')

window.Vue = require('vue')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',


    mounted() {
        axios.get('/teams').then((response) => {
            this.teams = response.data
        })
    },


    data() {
        return {
            newTeamForm: new Form({
                name: '',
            }),
            newPlayerForm: new Form({
                team_id: null,
                first_name: '',
                last_name: '',
            }),
            teams: [],
        }
    },


    methods: {
        addTeam() {
            axios.post('/teams', this.newTeamForm.data).then((response) => {
                this.teams.push(response.data)
                this.newTeamForm.reset()
            }).catch((error) => {
                this.newTeamForm.errors.record(error.response.data.errors)
            })
        },


        addPlayer() {
            axios.post('/players', this.newPlayerForm.data).then((response) => {
                const team = this.teams.find(team => team.id === response.data.team_id)

                if (team) {
                    team.players.push(response.data)
                }

                this.newPlayerForm.reset()
            }).catch((error) => {
                this.newPlayerForm.errors.record(error.response.data.errors)
            })
        },
    },
})
