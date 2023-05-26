<?php

namespace App\Http\Livewire\Settings;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyProfile extends Component
{
    use WithFileUploads;
    public $company_id;
    public $name;
    public $logo;
    public $temp_logo;
    public $display_logo;
    public $bg_image;
    public $temp_bg_image;
    public $display_bg_image;
    public $address;

    public function rules() { return [
        // 'editing.type' => 'required|in:'.collect(VmsPar::TYPES)->keys()->implode(','),
        'name' => 'required',
        'logo' => 'required',
        'bg_image' => 'nullable',
        'address' => 'nullable',
    ]; }

    public function save()
    {
        $validated = $this->validate();
        $validated['logo'] = $this->temp_logo->store('/','images');
        $validated['bg_image'] = $this->temp_bg_image->store('/','images');
        Company::find('1')->update($validated);
        return redirect()->route('dashboard',['user_id'=>auth()->user()->id]);
        $this->notify('Company profile updated, Successfully!');
    }

    public function updatedTempLogo()
    {
        $this->logo = $this->temp_logo->temporaryUrl();
    }

    public function updatedTempBgImage()
    {
        $this->bg_image = $this->temp_bg_image->temporaryUrl();
    }

    public function setFields()
    {
        $company = Company::find(1);
        $this->company_id = $company->id;
        $this->name = $company->name;
        $this->logo = $company->logoUrl();
        $this->bg_image = $company->bgUrl();
        $this->address = $company->address;
        $this->temp_logo = null;
        $this->temp_bg_image =null;
    }
    public function mount()
    {
        $this->setFields();
    }

    public function render()
    {
        return view('livewire.settings.company-profile');
    }
}
