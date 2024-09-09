<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();
        
        // Pass the users to the view in the 'admin/index' file
        return view('admin.index', compact('users'));
    }

    public function edit($id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id);
        
        // Return the edit view with the user data
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        // Update the user's data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($user->image && Storage::exists('public/' . $user->image)) {
                Storage::delete('public/' . $user->image);
            }
            
            // Store the new image
            $path = $request->file('image')->store('images', 'public');
            $user->image = $path;
        }
        
        // Save the updated user data
        $user->save();
        
        // Redirect to the admin dashboard with a success message
        return redirect()->route('admin.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Delete the user's image if it exists
        if ($user->image && Storage::exists('public/' . $user->image)) {
            Storage::delete('public/' . $user->image);
        }
        
        // Delete the user
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}
