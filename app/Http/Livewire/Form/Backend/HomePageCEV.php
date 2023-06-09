<?php

namespace App\Http\Livewire\Form\Backend;

use App\Services\Helper;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomePageCEV extends Component
{
    use WithFileUploads;

    public $logo;
    public $count_excerpt;
    public $review_excerpt;
    public $team_excerpt;
    public $counts;
    public $twitter;
    public $facebook;
    public $instagram;
    public $linkedin;
    public $youtube;
    public $google_business;
    public $embed_map_link;
    public $gr_api;
    public $gr_count_api;
    public $tag_line;
    public $hero_image;
    public $hero_video;
    public $address;
    public $email;
    public $contact_no;
    public $welcome_message;
    public $mission_message;
    public $vision_message;

    public $logoIsUploaded = false;
    public $CountImageIsUploaded = false;
    public $HeroImageIsUploaded = false;

    public function mount()
    {
        $this->logo = Helper::get_static_option('logo');
        $this->count_excerpt = Helper::get_static_option('count_excerpt');
        $this->review_excerpt = Helper::get_static_option('review_excerpt');
        $this->team_excerpt = Helper::get_static_option('team_excerpt');
        $this->twitter = Helper::get_static_option('twitter');
        $this->facebook = Helper::get_static_option('facebook');
        $this->instagram = Helper::get_static_option('instagram');
        $this->linkedin = Helper::get_static_option('linkedin');
        $this->youtube = Helper::get_static_option('youtube');
        $this->google_business = Helper::get_static_option('google_business');
        $this->embed_map_link = Helper::get_static_option('embed_map_link');
        $this->gr_api = Helper::get_static_option('gr_api');
        $this->gr_count_api = Helper::get_static_option('gr_count_api');
        $this->tag_line = Helper::get_static_option('tag_line');
        $this->hero_image = Helper::get_static_option('hero_image');
        $this->hero_video = Helper::get_static_option('hero_video');
        $this->address = Helper::get_static_option('address');
        $this->email = Helper::get_static_option('email');
        $this->contact_no = Helper::get_static_option('contact_no');
        $this->welcome_message = Helper::get_static_option('welcome_message');
        $this->mission_message = Helper::get_static_option('mission_message');
        $this->vision_message = Helper::get_static_option('vision_message');
    }

    protected $rules = [
        'logo' => '',
        'count_excerpt' => '',
        'review_excerpt' => '',
        'team_excerpt' => '',
        'twitter' => '',
        'facebook' => '',
        'instagram' => '',
        'linkedin' => '',
        'youtube' => '',
        'google_business' => '',
        'embed_map_link' => '',
        'gr_api' => '',
        'gr_count_api' => '',
        'tag_line' => '',
        'hero_image' => '',
        'hero_video' => '',
        'address' => '',
        'email' => '',
        'contact_no' => '',
        'welcome_message' => '',
        'mission_message' => '',
        'vision_message' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if (gettype($this->logo) != 'string') {
            $this->logoIsUploaded = true;
        }
        if (gettype($this->hero_image) != 'string') {
            $this->HeroImageIsUploaded = true;
        }
    }

    public function submit()
    {
        abort_if(Gate::denies('homepage'), 403);

        $validatedData = $this->validate();

        // foreach ($validatedData as $key => $value) {
        //     if ($this->logo == null) {
        //     } elseif (gettype($this->logo) != 'string') {
        //         $image = $this->logo->store('homepage', 'public');
        //         Helper::set_static_option($key, $image);
        //         unset($validatedData['logo']);
        //     }
        //     if ($this->hero_image == null) {
        //     } elseif (gettype($this->hero_image) != 'string') {
        //         $image = $this->hero_image->store('homepage', 'public');
        //         Helper::set_static_option($key, $image);
        //         unset($validatedData['hero_image']);
        //     }
        //     Helper::set_static_option($key, $value);
        // }

        foreach ($validatedData as $key => $value) {
            if ($key == 'hero_image' && !empty($validatedData['hero_image']) && gettype($validatedData['hero_image']) != 'string') {
                $hero_image = $validatedData['hero_image']->store('homepage', 'public');
                Helper::set_static_option($key, $hero_image);
                unset($validatedData['hero_image']);
            } elseif ($key == 'logo' && !empty($validatedData['logo']) && gettype($validatedData['logo']) != 'string') {
                $logo = $validatedData['logo']->store('homepage', 'public');
                Helper::set_static_option($key, $logo);
                unset($validatedData['logo']);
            } else {
                Helper::set_static_option($key, $value);
            }
        }




        return $this->redirectRoute('admin.homepage');
    }

    public function render()
    {
        return view('livewire.form.backend.home-page-c-e-v');
    }
}
