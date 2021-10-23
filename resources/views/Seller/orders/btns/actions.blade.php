<a href="{{ route($view .'.show', $item->id) }}" class="" id=""><i class="fa fa-2x fa-eye"></i></a>

<form action="{{route($view .'.destroy', $item->id)}}" class=".single-del" method="post">
    @csrf  @method("delete")
    <a href="" title="delete" data-id="{{$item->id}} " class="delbtn"><i class="fa fa-2x fa-trash"></i></a>
</form>
