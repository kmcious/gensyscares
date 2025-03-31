<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;
use CodeIgniter\Controller;

class AdminAnnouncement extends Controller
{
    public function index()
    {
        $model = new AnnouncementModel();
        $data['announcements'] = $model->findAll();
        return view('pages/adminSide/announcement_list', $data);
    }



    public function store()
    {
        $model = new AnnouncementModel();
        $id = $this->request->getPost('id');
    
        $data = [
            'title'      => $this->request->getPost('title'),
            'event_date' => $this->request->getPost('event_date'),
            'location'   => $this->request->getPost('location'),
        ];
    
        $image = $this->request->getFile('image');
    
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName(); // Prevent overwriting
            $image->move(ROOTPATH . 'public/images/announcementImage', $newName); // Move file
            $data['image_path'] = 'images/announcementImage/' . $newName; // Store relative path
        } else {
            $data['image_path'] = $this->request->getPost('existing_image'); // Keep old image if not replaced
        }
    
        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }
    
        return redirect()->to('/admin/announcements')->with('success', 'Announcement saved successfully!');
    }

    public function delete($id)
    {
        $model = new AnnouncementModel();
        $announcement = $model->find($id);

        if (!$announcement) {
            return redirect()->to('/admin/announcements')->with('error', 'Announcement not found.');
        }

        if ($announcement['image_path'] && file_exists($announcement['image_path'])) {
            unlink($announcement['image_path']);
        }

        $model->delete($id);
        return redirect()->to('/admin/announcements')->with('success', 'Announcement deleted successfully!');
    }
}
