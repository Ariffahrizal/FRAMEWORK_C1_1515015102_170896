<!-- <div class="form-group">
	<label class="col-sm-2 control-label">ID Mahasiswa</label>
	<div class="col-sm-10">
	{!! Form::text('mahasiswa_id',null,['class'=>'form-control','placeholder'=>"ID Mahasiswa"]) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">ID Ruangan</label>
	<div class="col-sm-10">
	{!! Form::text('ruangan_id',null,['class'=>'form-control','placeholder'=>"ID Ruangan"]) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">ID Dosen Matakuliah</label>
	<div class="col-sm-10">
	{!! Form::text('dosen_matakuliah_id',null,['class'=>'form-control','placeholder'=>"ID Dosen Matakuliah"]) !!}
	</div>
</div>
 -->

 <div class="form-group">
	<label class="col-sm-2 control-label" id="mahasiswa_id">ID Mahasiswa</label>
	<div class="col-sm-10">
		{!! Form::select('mahasiswa_id',$mahasiswa->listidmhs(),null,['class'=>'form-control','id'=>'mahasiswa_id']) !!}	
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" id="dosen_matakuliah_id">ID Matakuliah</label>
	<div class="col-sm-10">
		{!! Form::select('dosen_matakuliah_id',$dosen_matakuliah->listDosenDanMatakuliah(),null,['class'=>'form-control','id'=>'dosen_matakuliah_id']) !!}	
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" id="ruangan_id">ID Ruangan</label>
	<div class="col-sm-10">
		{!! Form::select('ruangan_id',$ruangan->lists('title','id'),null,['class'=>'form-control','id'=>'ruangan_id']) !!}	
	</div>
</div>