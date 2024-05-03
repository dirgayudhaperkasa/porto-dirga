<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>Input skill</h1>
                <hr>
                <div>
                    @if ($errors->any())
                        <ul style="color:red">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    @endif
                </div>
                <form method="POST" actions="{{ route('skill.InputSkill') }}">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="section-secondary-title">Skill name</h6>
                            <div class="form-group">
                                <Input type="text" class="form-control" name="SkillName" placeholder="Skill" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="section-secondary-title">Level</h6>
                            <div class="form-group">
                                <select class="form-control" name="Level" placeholder="Select skill level">
                                    @foreach($level_options as $option)
                                        <option value="{{$option['value']}}">{{$option['label']}}</option>
                                    @endforeach
                                </select>
                                {{-- <Input type="number" class="form-control" name="Level" placeholder="Skill Level" /> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="section-secondary-title">Description</h6>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="Description" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="section-secondary-title">Start date</h6>
                            <div class="form-group">
                                <Input type="date" class="form-control" name="StartDate" placeholder="Starting date" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
