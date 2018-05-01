@extends('layouts.default')

@section('content')
    <div class="page page-home pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-10 col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">Add Team</div>
                        <div class="card-body">
                            <form @submit.prevent="addTeam">
                                <div class="form-group row">
                                    <label for="name" class="col-xs-12 col-sm-3 col-lg-2">Team Name</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-10">
                                        <input type="text" v-model="newTeamForm.data.name" :class="`form-control ${ newTeamForm.errors.has('name') ? 'is-invalid' : '' }`" name="name" id="name" placeholder="Team Name">
                                        <div class="invalid-feedback">@{{ newTeamForm.errors.get('name') }}</div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mb-3" v-if="teams.length">
                        <div class="card-header">Add Player</div>
                        <div class="card-body">
                            <form @submit.prevent="addPlayer">
                                <div class="form-group row">
                                    <label for="name" class="col-xs-12 col-sm-3 col-lg-2">Team</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-10">
                                        <select type="text" v-model="newPlayerForm.data.team_id" :class="`form-control ${ newPlayerForm.errors.has('team_id') ? 'is-invalid' : '' }`" name="team_id" id="team_id">
                                            <option disabled value="">Select a team to add to</option>
                                            <option v-for="team in teams" :value="team.id">@{{ team.name }}</option>
                                        </select>
                                        <div class="invalid-feedback">@{{ newPlayerForm.errors.get('team_id') }}</div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-xs-12 col-sm-3 col-lg-2">First Name</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-10">
                                        <input type="text" v-model="newPlayerForm.data.first_name" :class="`form-control ${ newPlayerForm.errors.has('first_name') ? 'is-invalid' : '' }`" name="first_name" id="first_name" placeholder="First Name">
                                        <div class="invalid-feedback">@{{ newPlayerForm.errors.get('first_name') }}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-xs-12 col-sm-3 col-lg-2">Last Name</label>

                                    <div class="col-xs-12 col-sm-9 col-lg-10">
                                        <input type="text" v-model="newPlayerForm.data.last_name" :class="`form-control ${ newPlayerForm.errors.has('last_name') ? 'is-invalid' : '' }`" name="last_name" id="last_name" placeholder="Last Name">
                                        <div class="invalid-feedback">@{{ newPlayerForm.errors.get('last_name') }}</div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <h1 class="mb-3">Teams and players</h1>

                    <div v-for="team in teams" class="mb-3">
                        <h2 v-text="team.name"></h2>

                        <ul v-if="team.players.length > 0">
                            <li v-for="player in team.players">
                                @{{ player.first_name + ' ' + player.last_name }}
                            </li>
                        </ul>

                        <div v-else>
                            <p>No players yet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
