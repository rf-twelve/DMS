<?php

namespace App\Http\Livewire\Settings;

use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSettings extends Component
{
    use WithFileUploads;

    public $fullname;
    public $office;
    public $username;
    public $password;
    public $temp_password;
    public $email;
    public $avatar;
    public $temp_avatar;


    public function rules() { return [
        'fullname' => 'required',
        'username' => 'required',
        'temp_password' => 'required',
        'email' => 'nullable',
        'temp_avatar' => 'required',
    ]; }

    public function save()
    {
        $validated = $this->validate();
        $validated['avatar'] = $this->temp_avatar->store('/','images');
        $validated['password'] = ($this->temp_pass) ? Hash::make($this->temp_password) : $this->password;
        $validated['temp_pass'] = $this->temp_password;
        return redirect()->route('dashboard',['user_id'=>auth()->user()->id]);
        $this->notify('Company profile updated, Successfully!');
    }

    public function updatedTempAvatar()
    {
        $this->avatar = $this->temp_avatar->temporaryUrl();
    }

    public function setFields()
    {
        $user = auth()->user();
        $this->fullname = $user->fullname;
        $this->office = $user->officeName();
        $this->username = $user->username;
        $this->password = 'password';
        $this->email = $user->email;
        $this->avatar = $user->imageUrl();
    }
    public function mount()
    {
        $this->setFields();
    }

    public function render()
    {
        return view('livewire.settings.profile-settings');
    }
}
