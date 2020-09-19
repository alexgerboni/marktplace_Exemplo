@extends('layouts.app')
@section('content')
 <div class="col-12">
     <a  href="{{route('admin.read.all')}}" class="btn btn-sm btn-success">Marca como lida</a>
 </div>
<table class="table table-striped">
   
    <thead>
        <tr>
            <th>Notificação<th>
            <th>Criado em<th>
            <th>açoes</th>
        </tr>
    </thead>
    <tbody> 
        
        @forelse($unreadNotifications as $unread)
        <tr>
            <td></td> 
            <td>{{ $unread->data['message'] }}</td>
            <td>{{ $unread->created_at->locale('pt')->diffForHumans() }}<td>

            <div class="btn-group">
                <td>
                    <!-- CRIANDO LINK PARA ACESSAR VIEW-->
                    <a href="{{route('admin.read', ['notification' => $unread->id]) }}" class="btn btn-sm btn-primary">Marcar como lida</a>
                    
                </td>
            </div>


        </tr>
        @empty

        <tr>
            <td colspan="4">
                <div><p>nenhuma notificação encontrada</p></div>
            </td>
        </tr>
        @endforelse


    </tbody>
</table>
@endsection