<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocAction extends Model
{

    use HasFactory;
    protected $guarded = [];

    public function getReferFromFullnameAttribute(){
        return (User::find($this->refer_from))->fullname ?? '(Unknown)';
    }

    public function getReferToFullnameAttribute(){
        return (User::find($this->refer_to))->fullname ?? '(Unknown)';
    }

    public function getOfficeNameAttribute(){
        $user = User::find($this->refer_to);
        return (Office::find($user['office_id']))->name ?? '(Unknown)';
    }

    public function getDocumentStatusAttribute(){
        return Doc::Document_Status[$this->status] ?? '(Unknown)';
    }

    public function document(){
        return $this->belongsTo(Doc::class, 'doc_id', 'id');
    }

}
