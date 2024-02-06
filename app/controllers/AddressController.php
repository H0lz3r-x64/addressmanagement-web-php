<?php
namespace Controllers;

use Backend\Core\Controller;
use Models\Address;

class AddressController extends Controller
{
    public function index($params = [])
    {
        $addresses = Address::all();
        $this->loadView('address.index', ['addresses' => $addresses]);
    }

    public function store()
    {
        // Get the ID, field, and value from the request
        if (!isset($_POST['id']) || !isset($_POST['field']) || !isset($_POST['value'])) {
            echo 'error';
            return;
        }
        $id = $_POST['id'];
        $field = $_POST['field'];
        $value = $_POST['value'];

        // TODO: Validate the input

        // Find the address
        $address = Address::find($id);

        // Update the field
        $address->$field = $value;

        // Save the address
        $address->save();
        echo 'success';
    }

    public function storeProfilePicture()
    {
        // Get the ID from the request
        if (!isset($_POST['id']) || !isset($_FILES['profile_picture'])) {
            http_response_code(400);
            return;
        }
        $id = $_POST['id'];
        $profile_picture = $_FILES['profile_picture'];

        // Find the address
        $address = Address::find($id);

        // store the profile picture in img folder
        $target_dir = "img/";
        $target_file = $target_dir . basename($profile_picture["name"]);
        move_uploaded_file($profile_picture["tmp_name"], $target_file);

        // Upload the profile picture
        $address->profile_picture = $target_file;

        // Save the address
        $address->save();
        echo 'success';
    }

    public function create()
    {
        header('Content-Type: application/json');

        // Create a new address with default values
        $address = Address::create([
        ]);

        if ($address) {
            // Return a success response
            echo json_encode(['status' => 'success', 'message' => "Address with id {$address->id} created successfully."]);
        } else {
            // Return an error response
            echo json_encode(['status' => 'error', 'message' => "Address couldn't be created."]);
        }
    }

    public function delete()
    {
        header('Content-Type: application/json');
        if (!isset($_POST['id'])) {
            echo 'error';
            return;
        }
        $id = $_POST['id'];
        // Find the address
        $address = Address::find($id);

        // Check if the address was found
        if ($address) {
            // Return a success response
            $address->delete();
            echo json_encode(['status' => 'success', 'message' => "Address with id {$id} deleted successfully."]);
        } else {
            // Return an error response
            echo json_encode(['status' => 'error', 'message' => "Address with id {$id} not found."]);
        }
    }
}