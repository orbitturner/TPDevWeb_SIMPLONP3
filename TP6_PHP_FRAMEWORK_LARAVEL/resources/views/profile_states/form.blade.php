
<div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
    <label for="state_id" class="col-md-2 control-label">State</label>
    <div class="col-md-10">
        <select class="form-control" id="state_id" name="state_id" required="true">
        	    <option value="" style="display: none;" {{ old('state_id', optional($profileState)->state_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select state</option>
        	@foreach ($States as $key => $State)
			    <option value="{{ $key }}" {{ old('state_id', optional($profileState)->state_id) == $key ? 'selected' : '' }}>
			    	{{ $State }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

