<?php if (!defined('BASEPATH')) exit('No direct access allowed');

class Logout extends Admin_Controller
{
    protected $requireAuthentication = FALSE;

    public function index()
    {
        $this->lang->load('login');

        log_activity($this->user->getStaffId(), 'logged out', 'staffs', get_activity_message('activity_logged_out',
            ['{staff}', '{link}'],
            [$this->user->getStaffName(), $this->pageUrl('staffs/edit?id='.$this->user->getStaffId())]
        ));

        $this->user->logout();
        $this->alert->set('success', $this->lang->line('alert_success_logout'));
        $this->redirect('login');
    }
}

/* End of file Logout.php */
/* Location: ./admin/controllers/Logout.php */