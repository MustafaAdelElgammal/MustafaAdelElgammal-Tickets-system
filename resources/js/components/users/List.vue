<template>

    <div class="content-wrapper">
        <div class="card">
    
            <div class="card-header w3-border-bottom w3-border-light-gray">
                <a href="#" class="btn btn-social btn-relief-primary" @click="onClick">
                    <i class="fa fa-plus"></i> add
                </a>  
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-border default-datatable" id="table_id">
                        <thead>
                        <tr>
                            <th> ID</th>
                            <th> full_name </th>
                            <th>email'</th>
                            <th> حالة المستخدم</th>
                            <th> role</th>
                            <th></th>
                        </tr>
                        </thead>
                           <tbody>
                            
                                <tr v-for="row in users" v-bind:key= 'row.id'>
                                    <td>{{ row.id }}</td>
                                    <td>{{ row.name }}</td>
                                    <td>{{ row.email }}</td>
                                    <td>
                                        
                                            <span class="label text-success d-flex" v-if="row.status == 'مفعل'">
                                                <div class="dot-label bg-success ml-1"></div>enabled
                                            </span>
                                        
                                            <span class="label text-success d-flex" v-if="row.status == 'غير مفعل'">
                                                <div class="dot-label bg-danger ml-1"></div>disabled
                                            </span>
                                        
                                    </td>
                                    <td>{{ row.roles_name[0] }}</td>
                                    <td>


                                        <!-- <div>
                                            @can('user-list')
                                                <a class="btn btn-success btn-sm"
                                                href="{{ route('users.show', $row->id) }}">{{ trans('main_trans.show') }}</a>

                                            @endcan
                                            @can('user-edit')
                                                <a class="btn btn-primary btn-sm"
                                                href="{{ route('users.edit', $row->id) }}">{{ trans('main_trans.edit') }}</a>

                                            @endcan
                                            @can('user-delete')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',
                                                                        $row->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit( trans('main_trans.delete') , ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            @endcan

                                        </div> -->
                                    </td>
                                </tr>
                            </tbody>
                    </table> 
                </div>
            </div>
        </div>

    </div>

</template>

<script>

export default {
    name:'userslist',
    data(){
        return { users:new Array() }
    },
    methods:{
        onClick: function() {
        axios({
            url: '/users',
            method: 'GET'
        }).then((res) =>{
                this.users = res.data.data;
                console.log(res.data.data);
            })
        }
    }
}

</script>