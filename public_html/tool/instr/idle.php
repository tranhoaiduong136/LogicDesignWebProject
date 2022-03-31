    <img id="idle-datapath" src ='tool/datapath/single-cycle-idle.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-idle"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath in idle state &#12299;</p>

    <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid mx-auto px-auto py-5 border-top">
        <div class="d-flex flex-column justify-content-center text-left mx-5 px-5">
            <div class="d-block">
                <h4 class="mb-5"><mark>Details</mark></h4>
                <?php
                    $inserted = include('instr/component.php');
                ?>
                <div id="overall-explanation" class="mb-5">
                    <h5 class="fw-bold">Overall datapath explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">The datapath is based on Figure 4.17, page 265 in the book
                        <a href="https://ict.iitk.ac.in/wp-content/uploads/CS422-Computer-Architecture-ComputerOrganizationAndDesign5thEdition2014.pdf">
                        Computer Organization and Design – The Hardware / Software Interface (Fifth edition) by David A. Paterson & John L. Hennessy</a>.
                        </li>
                        <li class="list-group-item">Arrowheads on wires are only to present which component is driving the wires, wires itself are not directional.</li>
                        <li class="list-group-item">Subscripting operators indicate bit selection.</li>
                    </ul>
                </div>
                <div id="control-explanation" class="mb-5">
                    <h5 class="fw-bold">Control signals detail</h5>
                    <table class="table table-sm table-responsive table-hover table-bordered text-center align-middle mb-5">
                    <caption>ALU Control signal and its corresponding operation</caption>
                        <thead>
                            <tr>
                                <th scope="col">ALU Control signals</th>
                                <th scope="col">Functions performed by ALU</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0000</td>
                                <td>and</td>
                            </tr>
                            <tr>
                                <td>0001</td>
                                <td>or</td>
                            </tr>
                            <tr>
                                <td>0010</td>
                                <td>add</td>
                            </tr>
                            <tr>
                                <td>0110</td>
                                <td>subtract</td>
                            </tr>
                            <tr>
                                <td>0111</td>
                                <td>set on less than</td>
                            </tr>
                            <tr>
                                <td>1100</td>
                                <td>NOR</td>
                            </tr>
                      </tbody>
                    </table>
                    <table class="table table-sm table-responsive table-hover table-bordered text-center align-middle mb-5">
                    <caption>ALU Control decoder</caption>
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">ALUOp</th>
                                <th scope="col" colspan="6">Funct field</th>
                                <th scope="col" rowspan="2" class="align-middle">Operation</th>
                            </tr>
                            <tr>
                                <th scope="col">ALUOp1</th>
                                <th scope="col">ALUOp0</th>

                                <th scope="col">F5</th>
                                <th scope="col">F4</th>
                                <th scope="col">F3</th>
                                <th scope="col">F2</th>
                                <th scope="col">F1</th>
                                <th scope="col">F0</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0</td>
                                <td>0</td>

                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>

                                <td>0010</td>
                            </tr>
                            <tr>
                                <td>X</td>
                                <td>1</td>

                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>

                                <td>0110</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>X</td>

                                <td>X</td>
                                <td>X</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>

                                <td>0010</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>X</td>

                                <td>X</td>
                                <td>X</td>
                                <td>0</td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>

                                <td>0110</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>X</td>

                                <td>X</td>
                                <td>X</td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>
                                <td>0</td>

                                <td>0000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>X</td>

                                <td>X</td>
                                <td>X</td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>
                                <td>1</td>

                                <td>0001</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>X</td>

                                <td>X</td>
                                <td>X</td>
                                <td>1</td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>

                                <td>0111</td>
                            </tr>
                      </tbody>
                    </table>
                    <table class="table table-sm table-responsive table-hover table-bordered align-middle">
                    <caption>Main Control unit</caption>
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Main Control signals</th>
                                <th scope="col">Activity</th>
                                <th scope="col">Purpose</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center">PCSrc</th>
                                <td class="text-center">PC update</td>
                                <td class="text-left">Indicates whether the PC is replaced by the normal increment value PC &#8592; (PC + 4) or another target address</td>
                            </tr>
                            <tr>
                                <th class="text-center">Branch</th>
                                <td class="text-center">PC update</td>
                                <td class="text-left">Combined with a condition test boolean to enable loading the branch target address into the PC</td>
                            </tr>
                            <tr>
                                <th class="text-center">ALUSrc</th>
                                <td class="text-center">Source operand fetch</td>
                                <td class="text-left">Selects the second source operand for the ALU from either register rt or sign-extended immediate field</td>
                            </tr>
                            <tr>
                                <th class="text-center">ALUOp</th>
                                <td class="text-center">ALU operation</td>
                                <td class="text-left">Either specifies the ALU operation to be performed or specifies that the operation should be determined from the function bits</td>
                            </tr>
                            <tr>
                                <th class="text-center">MemRead</th>
                                <td class="text-center">Memory access</td>
                                <td class="text-left">Enables a memory read for load instructions</td>
                            </tr>
                            <tr>
                                <th class="text-center">MemWrite</th>
                                <td class="text-center">Memory access</td>
                                <td class="text-left">Enables a memory write for store instructions</td>
                            </tr>
                            <tr>
                                <th class="text-center">RegWrite</th>
                                <td class="text-center">Register write</td>
                                <td class="text-left">Enables a write to one of the registers</td>
                            </tr>
                            <tr>
                                <th class="text-center">RegDst</th>
                                <td class="text-center">Register write</td>
                                <td class="text-left">Determines how the destination register is specified (rt or rd)</td>
                            </tr>
                            <tr>
                                <th class="text-center">MemtoReg</th>
                                <td class="text-center">Register write</td>
                                <td class="text-left">Determines where the value to be written comes from (ALU result or memory)</td>
                            </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



