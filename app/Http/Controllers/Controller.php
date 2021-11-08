<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Redirect If denial of permission
     *
     * @param string $route
     * @param mixed|null $param
     * @param null $message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permissionDenied($route = '/', $param = null, $message = null)
    {
        $status = $message['message'] ?? "Permission Denied: You don't have permission to perform this action.";

        return redirect()->route($route, $param)
                        ->with('status', $status);
    }
}
