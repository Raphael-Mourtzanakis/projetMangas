
    <h1></h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Couverture</th>
            
        </tr>
        </thead>
        
        <tr>
            <td>
                <img class="img-thumbnail" src="{{ url('') }}">
            </td>
         
            <td>
                <a href="{{url('/')}}"><i class="bi"></i></a>
            </td>
            <td>
                <a onclick="return confirm('Supprimer ce manga ?')"
                   href="{{url('/')}}"><i class="bi"></i></a>
            </td>
        </tr>
        
    </table>