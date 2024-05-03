<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Enums\Level;
use Spatie\LaravelOptions\Options;

class SkillController extends Controller
{
    public function Index(){
        return view('skill.index', ['skills' => $this->GetAll(), 'level_options' => Options::forEnum(Level::class)]);
    }

    public function GetAll(){
        $skills = Skill::all();
        return $skills;
    }

    public function Create(){
        return view('skill.create', ['level_options' => Options::forEnum(Level::class)->toArray()]);
    }

    public function InputSkill(Request $request){
        $data = $request->validate([
            'SkillName' => 'required',
            'Level' => Options::forEnum(Level::class)->toValidationRule(),
            'Description' => 'nullable',
            'StartDate' => 'required|date'
        ]);
        //dd($request); data dump to view
        $newSkill = Skill::create($data);
        return redirect(route('skill.index'));
    }

    public function Edit(Skill $skill){
        return view('skill.edit', ['skill' => $skill, 'level_options' => Options::forEnum(Level::class)->toArray()]);
    }

    public function UpdateSkill(Skill $skill, Request $request){
        $data = $request->validate([
            'SkillName' => 'required',
            'Level' => Options::forEnum(Level::class)->toValidationRule(),
            'Description' => 'nullable',
            'StartDate' => 'required|date'
        ]);
        $skill->update($data);

        return redirect(route('skill.index'))->with('success', 'Skill updated successfully');
    }

    public function DeleteSkill(Skill $skill){
        $skill->delete();
        return redirect(route('skill.index'))->with('success', 'Skill deleted');
    }
}
