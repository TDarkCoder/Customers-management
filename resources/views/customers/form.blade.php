<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ?? $customer->name }}">
            <span>{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') ?? $customer->email }}">
            <span>{{ $errors->first('email') }}</span>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="active" id="status" class="form-control">
                <option value="" disabled>Select status</option>
                @foreach($customer->activeOptions() as $optionKey => $optionValue)
                    <option value="{{ $optionKey }}" {{ $customer->active == $optionValue ? 'selected' : '' }}>{{ $optionValue }}</option>
                @endforeach
            </select>
            <span>{{ $errors->first('active') }}</span>
        </div>
        <div class="form-group">
            <label for="company_id">Company</label>
            <select name="company_id" id="company_id" class="form-control">
                <option value="" disabled>Select company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : ''}}>{{ $company->name }}</option>
                @endforeach
            </select>
            <span>{{ $errors->first('company_id') }}</span>
        </div>
        <div class="form-group">
            <label for="image" class="btn btn-outline-dark">Choose avatar</label>
            <input type="file" id="image" name="image" class="d-none">
        </div>
    </div>
</div>
@csrf
