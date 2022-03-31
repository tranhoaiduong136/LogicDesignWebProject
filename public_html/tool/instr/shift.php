    <img id="idle-datapath" src ='tool/datapath/single-cycle-shift.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-shift-logical"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath of instruction &lsquo;sll / srl&rsquo; &#12299;</p>

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
                        <li class="list-group-item">
                             <table class="table table-sm table-responsive table-hover table-bordered text-center align-middle mb-3">
                                 <thead class="table-success">
                                     <tr>
                                         <td>Name</td>
                                         <td>Instruction format</td>
                                         <td>Operation</td>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td>sll</td>
                                         <td>sll &#36;rd, &#36;rt, shamt</td>
                                         <td>R[rd] = R[rt] &lt;&lt; shamt </td>
                                     </tr>
                                     <tr>
                                         <td>srl</td>
                                         <td>srl &#36;rd, &#36;rt, shamt</td>
                                         <td>R[rd] = R[rt] &gt;&gt; shamt </td>
                                     </tr>
                                 </tbody>
                             </table>
                        </li>
                        <li class="list-group-item">Coding format: R-type
                            <table class="table table-sm table-responsive table-bordered text-center align-middle">
                                <tbody>
                                    <tr>
                                        <td>[31-26]: opcode</td>
                                        <td>[25-21]: &#36;rs</td>
                                        <td>[20-16]: &#36;rt</td>
                                        <td>[15-11]: &#36;rd</td>
                                        <td>[10-6]: shamt</td>
                                        <td>[5-0]: funct</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item">Control signals
                            <table class="table table-sm table-responsive table-bordered text-center mt-2">
                                <thead class="table-success">
                                    <tr>
                                        <td colspan="11">Main control</td>
                                    </tr>
                                    <tr>
                                        <td>shift</td>
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
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <small class="fst-italic fw-light">Note: The ALU Control signal for
                            shifting are not specified as it is part of the extension, <a href="#ext-explanation" class="text-decoration-none text-success">see details below</a>.</small>
                        </li>
                        <li class="list-group-item"> Execution flow <br> &#129170;
                            <small class="fst-italic fw-light">Note that this is for reference purpose and these steps are not necessarily happening in this exact order.</small>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item border-0">Fetch instruction and increment PC.</li>
                                <li class="list-group-item border-0">Obtain operand &#36;rt from register file and shift amount from bits [10-6] of the instruction.</li>
                                <li class="list-group-item border-0">Perform necessary ALU operation.</li>
                                <li class="list-group-item border-0">Select output from ALU to be written to destination register.</li>
                                <li class="list-group-item border-0">Write back to destination register.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
                <div id="ext-explanation" class="mb-5">
                    <h5 class="fw-bold">Extension explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">To add sll and/or srl to the set, additional components needed are:
                            <ul>
                                <li>1 MUX to select the first operand for ALU, it will choose between bits [10-6] of the instruction
                                (shamt field) or the data read from &#36;rs.</li>
                                <li>1 wire supplying bits [10-6] of the instruction to the above MUX.</li>
                                <li>1 control line &lsquo;shift&rsquo; to control the new MUX.</li>
                            </ul>
                        </li>
                        <li class="list-group-item">Besides added components, we also need to make some modification to the ALU Control and ALU unit.
                        The internal modification of ALU unit shall not be discussed here.<br>
                        As for ALU Control signals, two new signals are added to specify the shift left / right operation.
                            <table class="table table-sm table-responsive table-hover table-bordered text-center align-middle mt-3 mb-5">
                            <caption> Modified ALU Control signals - 2 more rows added</caption>
                                <thead class="table-secondary">
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
                                    <tr class="table-primary">
                                        <td>1000</td>
                                        <td>shift left logical</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>1001</td>
                                        <td>shift right logical</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm table-responsive table-hover table-bordered text-center align-middle mb-5">
                            <caption>Modified ALU Control decoder - 2 newly added rows and its corresponding modified rows are highlighted</caption>
                                <thead class="table-secondary">
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
                                    <tr class="table-success">
                                        <td>1</td>
                                        <td>X</td>

                                        <td>1</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>

                                        <td>0010</td>
                                    </tr>
                                    <tr class="table-info">
                                        <td>1</td>
                                        <td>X</td>

                                        <td>1</td>
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
                                    <tr class="table-success">
                                        <td>1</td>
                                        <td>X</td>

                                        <td>0</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>

                                        <td>1000</td>
                                    </tr>
                                    <tr class="table-info">
                                        <td>1</td>
                                        <td>X</td>

                                        <td>0</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>

                                        <td>1001</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



