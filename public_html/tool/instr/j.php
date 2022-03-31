    <img id="idle-datapath" src ='tool/datapath/single-cycle-j.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-jump"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath of instruction &lsquo;j&rsquo; &#12299;</p>

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
                        For this instruction, extension is needed, <a href="#ext-explanation" class="text-decoration-none text-success">see details below</a>.
                        </li>
                        <li class="list-group-item">Arrowheads on wires are only to present which component is driving the wires, wires itself are not directional.</li>
                        <li class="list-group-item">Subscripting operators indicate bit selection.</li>
                    </ul>
                </div>
                <div id="instruction-explanation" class="mb-5">
                    <h5 class="fw-bold">Instruction explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">Instruction name: Jump / j JumpAddr
                        </li>
                        <li class="list-group-item">Operation: PC = JumpAddr</li>
                        <li class="list-group-item">Coding format: J-type
                            <table class="table table-sm table-responsive table-bordered text-center align-middle">
                                <tbody>
                                    <tr>
                                        <td>[31-26]: opcode</td>
                                        <td>[25-0]: target address</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item">Control signals
                            <table class="table table-sm table-responsive table-bordered text-center mt-2">
                                <thead class="table-success">
                                    <tr>
                                        <td colspan="11">Main control</td>
                                        <td rowspan="2" class="align-middle">ALU control</td>
                                    </tr>
                                    <tr>
                                        <td>Jump</td>
                                        <td>PCSrc</td>
                                        <td>Branch</td>
                                        <td>ALUSrc</td>
                                        <td>ALUOp1</td>
                                        <td>ALUOp0</td>
                                        <td>MemRead</td>
                                        <td>MemWrite</td>
                                        <td>RegWrite</td>
                                        <td>RegDst</td>
                                        <td>MemtoReg</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item"> Execution flow <br> &#129170;
                            <small class="fst-italic fw-light">Note that this is for reference purpose and these steps are not necessarily happening in this  exact order.</small>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item border-0">Fetch instruction and calculate PC+4.</li>
                                <li class="list-group-item border-0">Shift the lower 26 bits of the instruction left two bits.</li>
                                <li class="list-group-item border-0">Concatenate the upper 4 bits of PC+4 as high-order bits to form a 32-bit address.</li>
                                <li class="list-group-item border-0">Supply the new address into the program counter.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
                <div id="ext-explanation" class="mb-5">
                    <h5 class="fw-bold">Extension explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">This instruction uses uses neither registers nor the ALU nor memory access.</li>
                        <li class="list-group-item">Its only effect is to change the PC, and the new PC is calculated by concatenating
                        the top four bits of the current PC+4, bits 25-0 of the instruction, and 00<sub>two</sub>. <br>
                        Thus, added components include:
                            <ul>
                                <li>1 shift-left-2 component, a wire supplying bits [25-0] of the instruction to this shifter.</li>
                                <li>1 component to concatenate the top four bits of PC+4 to the shifted address.</li>
                                <li>1 control line &lsquo;Jump&rsquo; and 1 MUX to choose between the jump address and either the computed branch address or PC+4 as the new PC.</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



