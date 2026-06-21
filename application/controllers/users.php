<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->cek_role('admin');
        $this->load->model('users_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen User';
        $data['users'] = $this->users_model->get_all();
        $this->render('users/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';
        $this->render('users/tambah', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama',     'Nama',     'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role',     'Role',     'required|in_list[admin,sales,manager]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Tambah User';
            $this->render('users/tambah', $data);
        } else {
            $insert = [
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role'     => $this->input->post('role'),
            ];
            $this->users_model->insert($insert);
            $this->session->set_flashdata('success', 'User berhasil ditambahkan.');
            redirect('users');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['user']  = $this->users_model->get_by_id($id);
        if (!$data['user']) show_404();
        $this->render('users/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,sales,manager]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Edit User';
            $data['user']  = $this->users_model->get_by_id($id);
            $this->render('users/edit', $data);
        } else {
            $update = [
                'nama' => $this->input->post('nama'),
                'role' => $this->input->post('role'),
            ];
            // Update password jika diisi
            if ($this->input->post('password')) {
                $update['password'] = md5($this->input->post('password'));
            }
            $this->users_model->update($id, $update);
            $this->session->set_flashdata('success', 'User berhasil diperbarui.');
            redirect('users');
        }
    }

    public function hapus($id)
    {
        // Jangan hapus diri sendiri
        if ($id == $this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Tidak dapat menghapus akun sendiri.');
            redirect('users');
            return;
        }
        $this->users_model->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus.');
        redirect('users');
    }
}