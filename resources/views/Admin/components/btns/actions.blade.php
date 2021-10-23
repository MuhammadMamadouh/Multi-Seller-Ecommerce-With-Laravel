<a href="{{ route($view .'.edit', $item->id) }}" class="" id=""><i class="fa fa-2x fa-edit"></i></a>

<form action="{{route($view .'.destroy', $item->id)}}" class="single-del d-inline-block" method="post">
    @csrf  @method("delete")
    <a href="" title="delete" data-id="{{$item->id}} " class="delbtn"><i class="fa fa-2x fa-trash"></i></a>
</form>
