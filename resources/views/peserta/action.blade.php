<a href="{{route('peserta.edit', [$pes->id_peserta])}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
<form style="display: inline;" method="post" action="{{route('peserta.destroy', [$pes->id_peserta])}}">
	{{csrf_field()}}
	{{method_field('delete')}}
	<button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</button>
</form>