
<div class="modal fade" id="role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-50" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title badge orange"><i class="material-icons">supervised_user_circle
                    </i>Assign Role
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="role-url" data-roleurl = "{{ route('camp.assignrole', ['camp' => $camp]) }}">
            </div>
            <form>
            <div class="modal-body">
                    <div class="row p-2">
                        <table class="table table-borderless table-sm">
                        <tbody class="p-4">
                            <tr>
                                <td>1</td>
                                <td>Admin</td>
                                <td>
                                <select data-role="admin" data-row='1' class="custom-select" name='admin' id="admin" required>
                                  <option value="" selected disabled>Assign Role</option>
                                  @foreach ($users as $key => $user)
                                  <option value="{{ $user->id }}"
                                  {{ $user->AssignedUser(1, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                  {{ $user->name }}
                                    </option>
                                  @endforeach
                                </select>
                                  <div class="error-msg" id="error_msg_1"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Medical</td>
                                <td>
                                  <select  data-role="medical" data-row='2' class="custom-select" name='medical' id="medical" required>
                                      <option value="" selected disabled>Assign Role</option>
                                        @foreach ($users as $key => $user)
                                        <option value="{{ $user->id }}"
                                          {{ $user->AssignedUser(2, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                          {{ $user->name }}
                                        </option>
                                        @endforeach
                                  </select>
                                  <div class="error-msg" id="error_msg_2"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Reception</td>
                                <td>
                                  <select  data-role="reception" data-row='3' class="custom-select" name='reception' id="reception" required>
                                    <option value="" selected disabled>Assign Role</option>
                                      @foreach ($users as $key => $user)
                                      <option value="{{ $user->id }}"
                                        {{ $user->AssignedUser(3, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                      </option>
                                      @endforeach
                                  </select>

                                    <div class="error-msg" id="error_msg_3"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Doctor</td>
                                <td>
                                  <select  data-role="doctor" data-row='4' class="custom-select" name='doctor' id="doctor" required>
                                    <option value="" selected disabled>Assign Role</option>
                                      @foreach ($users as $key => $user)
                                      <option value="{{ $user->id }}"
                                        {{ $user->AssignedUser(4, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                      </option>
                                      @endforeach
                                  </select>
                                    <div class="error-msg" id="error_msg_4"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Counselling</td>
                                <td>
                                  <select  data-role="counselling" data-row="5" class="custom-select" name='counselling' id="counselling" required>
                                    <option value="" selected disabled>Assign Role</option>
                                      @foreach ($users as $key => $user)
                                      <option value="{{ $user->id }}"
                                        {{ $user->AssignedUser(5, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                      </option>
                                      @endforeach
                                  </select>
                                      <div class="error-msg" id="error_msg_5"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Blooddraw</td>
                                <td>
                                  <select  data-role="blooddraw" data-row="6" class="custom-select" name='blooddraw' id="blooddraw" required>
                                    <option value="" selected disabled>Assign Role</option>
                                      @foreach ($users as $key => $user)
                                      <option value="{{ $user->id }}"
                                        {{ $user->AssignedUser(6, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                      </option>
                                      @endforeach
                                  </select>
                                    <div class="error-msg" id="error_msg_6"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>Physiotheraphy</td>
                                <td>
                                  <select data-role="physiotheraphy" data-row="7" class="custom-select" name='physiotheraphy' id="physiotheraphy" required>
                                    <option value="" selected disabled>Assign Role</option>
                                      @foreach ($users as $key => $user)
                                      <option value="{{ $user->id }}"
                                        {{ $user->AssignedUser(7, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                      </option>
                                      @endforeach
                                  </select>

                                      <div class="error-msg" id="error_msg_7"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>Hobbies</td>
                                <td>
                                  <select  data-role="hobbies" data-row="8" class="custom-select" name='hobbies' id="hobbies" required>
                                    <option value="" selected disabled>Assign Role</option>
                                      @foreach ($users as $key => $user)
                                      <option value="{{ $user->id }}"
                                        {{ $user->AssignedUser(8, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                      </option>
                                      @endforeach
                                  </select>
                                    <div class="error-msg" id="error_msg_8"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>9</td>
                                <td>Settled TA</td>
                                <td>
                                  <select  data-role="settled" data-row="9" class="custom-select" name='settled' id="settled" required>
                                    <option value="" selected disabled>Assign Role</option>
                                      @foreach ($users as $key => $user)
                                      <option value="{{ $user->id }}"
                                        {{ $user->AssignedUser(9, $camp->id)['user_id'] == $user->id ? 'selected' : ''}}>
                                        {{ $user->name }}
                                      </option>
                                      @endforeach
                                  </select>
                                    <div class="error-msg" id="error_msg_9"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                  <button type="submit"class="btn btn-blue float-right mb-3">
                  Ok
                </button>
            </div>
        </div>
    </div>
</div>
