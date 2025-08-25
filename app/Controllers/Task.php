<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;

class Task extends BaseController
{

    protected $taskModel;
    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }
    public function home()
    {
        $userId = session()->get('id');
        $statusFilter = $this->request->getGet('status');

        $query = $this->taskModel->where('user_id', $userId);

        if ($statusFilter && $statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        $data = [
            'title' => 'Home',
            'tasks' => $query->findAll(),
            'selectedStatus' => $statusFilter,
            'validation' => service('validation')
        ];

        return view('home', $data);
    }


    public function insert()
    {
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.'
                ],
            ],
            'deadline' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deadline wajib diisi!'
                ],
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Wajib diisi!'
                ],
            ],
            'prioritas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas wajib diisi!'
                ],
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Wajib diisi!'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $userId = session()->get('id');
            $statusFilter = $this->request->getGet('status');

            $query = $this->taskModel->where('user_id', $userId);
    
            if ($statusFilter && $statusFilter !== 'all') {
                $query->where('status', $statusFilter);
            }
            
            $data = [
                'title' => 'form tambah',
                'tasks' => $this->taskModel->where('user_id', $userId)->findAll(),
                'selectedStatus' => $statusFilter,
                'validation' => service('validation')
            ];

            return view('home', $data);
        } else {

            $userId = (int) session()->get('id');
            $this->taskModel->insert([
                'judul'     => $this->request->getVar('judul'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'deadline'  => $this->request->getVar('deadline'),
                'kategori'  => $this->request->getVar('kategori'),
                'prioritas' => $this->request->getVar('prioritas'),
                'status'    => 'belum_selesai',
                'user_id'   => $userId
            ]);

            session()->setFlashdata('berhasil', 'Tugas berhasil ditambahkan!');
            return redirect()->to('home');
        }
    }


    public function edit($id)
    {
        $data = [
            'title' => 'form edit',
            'validation' => service('validation'),
            'task' => $this->taskModel->find($id)
        ];

        return view('task/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!'
                ],
            ],
            'deadline' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deadline wajib diisi!'
                ],
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Wajib diisi!'
                ],
            ],
            'prioritas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas wajib diisi!'
                ],
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Wajib diisi!'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Update Tugas',
                'task' => $this->taskModel->find($id),
                'validation' => service('validation')
            ];

            return view('task/edit', $data);
        }

        $this->taskModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'deadline'  => $this->request->getPost('deadline'),
            'kategori'  => $this->request->getPost('kategori'),
            'prioritas' => $this->request->getPost('prioritas'),
        ]);

        session()->setFlashdata('berhasil', 'Data Tugas berhasil diperbarui');
        return redirect()->to('home');
    }

    public function delete($id)
    {
        $this->taskModel->delete($id);
        session()->setFlashdata('berhasil', 'Data berhasil dihapus');
        return redirect()->to('home');
    }

    public function complete($id)
    {
        $this->taskModel->update($id, [
            'status' => 'selesai'
        ]);
        session()->setFlashdata('success', 'Tugas berhasil diselesaikan');
        return redirect()->to('home');
    }

    public function kategori($namaKategori)
    {
        $userId = session()->get('id');
        $task = $this->taskModel
            ->where('kategori', $namaKategori)
            ->where('user_id', $userId)
            ->findAll();

        $data = [
            'title' => 'Kategori:' . ($namaKategori),
            'kategori' => $namaKategori,
            'tasks' => $task
        ];

        return view('task/kategori', $data);
    }

    public function calendar()
    {
        $data = [
            'title' => 'Kalender'
        ];
        return view('task/calendar', $data);
    }

    public function events()
    {
        $userId = session()->get('id');

        $tasks = $this->taskModel->where('user_id', $userId)->findAll();

        $events = [];

        foreach ($tasks as $task) {
            $events[] = [
                'id' => $task['id'],
                'title' => $task['judul'],
                'start' => date('Y-m-d\TH:i:s', strtotime($task['deadline'])),
                'description' => $task['deskripsi']
            ];
        }

        return $this->response->setJSON($events);
    }
}
