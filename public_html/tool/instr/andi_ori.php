    <img id="idle-datapath" src ='tool/datapath/single-cycle-zeroext.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-i-type-andi-ori"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath of instruction &lsquo;andi / ori&rsquo; &#12299;</p>

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
                                        <td>andi</td>
                                        <td>andi &#36;rt, &#36;rs, imm</td>
                                        <td>R[rt] = R[rs] & ZeroExtImm</td>
                                    </tr>
                                    <tr>
                                        <td>ori</td>
                                        <td>ori &#36;rt, &#36;rs, imm</td>
                                        <td>R[rt] = R[rs] | ZeroExtImm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item">Coding format: I-type
                            <table class="table table-sm table-responsive table-bordered text-center align-middle">
                                <tbody>
                                    <tr>
                                        <td>[31-26]: opcode</td>
                                        <td>[25-21]: &#36;rs</td>
                                        <td>[20-16]: &#36;rt</td>
                                        <td>[15-0]: imm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item">Control signals
                            <table class="table table-sm table-responsive table-bordered text-center mt-2">
                                <thead class="table-success">
                                    <tr>
                                        <td rowspan="2" class="align-middle">Instruction</td>
                                        <td colspan="9">Main control</td>
                                        <td rowspan="2" class="align-middle">ALU control</td>
                                    </tr>
                                    <tr>
                                        <td>ExtOp</td>
                                        <td>PCSrc</td>
                                        <td>Branch</td>
                                        <td>ALUSrc</td>
                                        <td>MemRead</td>
                                        <td>MemWrite</td>
                                        <td>RegWrite</td>
                                        <td>RegDst</td>
                                        <td>MemtoReg</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>andi</td>

                                        <td rowspan="2" class="align-middle">0</td>
                                        <td rowspan="2" class="align-middle">0</td>
                                        <td rowspan="2" class="align-middle">0</td>
                                        <td rowspan="2" class="align-middle">1</td>
                                        <td rowspan="2" class="align-middle">0</td>
                                        <td rowspan="2" class="align-middle">0</td>
                                        <td rowspan="2" class="align-middle">1</td>
                                        <td rowspan="2" class="align-middle">0</td>
                                        <td rowspan="2" class="align-middle">0</td>

                                        <td>0000</td>
                                    </tr>
                                    <tr>
                                        <td>ori</td>
                                        <td>0001</td>
                                    </tr>
                                </tbody>
                            </table>
                            <small class="fst-italic fw-light">Note: The ALUOp signal is not specified
                            as it is part of the extension, <a href="#ext-explanation" class="text-decoration-none text-success">see details below</a>.</small>
                        </li>
                        <li class="list-group-item"> Execution flow <br> &#129170;
                            <small class="fst-italic fw-light">Note that this is for reference purpose and these steps are not necessarily happening in this exact order.</small>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item border-0">Fetch instruction and increment PC.</li>
                                <li class="list-group-item border-0">Obtain value of &#36;rs from register file and extend the 16-bit immediate value.</li>
                                <li class="list-group-item border-0">Select the zero-extended immediate as the second input of ALU and perform necessary ALU operation.</li>
                                <li class="list-group-item border-0">Select output from ALU to be written to destination register.</li>
                                <li class="list-group-item border-0">Write back to destination register &#36;rt.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
                <div id="ext-explanation" class="mb-5">
                    <h5 class="fw-bold">Extension explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">Note that for these two instructions, the immediate field is zero-extended.
                        So, the existing sign-extend component can be modified to adapt to this change. Another control signal input &lsquo;ExtOp&rsquo;
                        is added, if this signal is 0, the component should perform zero-extend operation on its input, and if it is 1,
                        sign-extend operation should be executed.
                        </li>
                        <li class="list-group-item">Beside the added components, there is another problem: the existing 2-bit ALUOp signal
                        can only specify add (00) for load / store, subtract (01) for branch, operations
                        based on funct (10) for R-type instructions. Thus, we need to change it to a 3-bit signal, then
                        add for load / store will be 000, subtract for branch become 001 and 010 specify operations based on funct field.
                            <table class="table table-sm table-responsive table-hover table-bordered text-center align-middle mt-3 mb-5">
                            <caption>Modified ALU Control decoder - 2 rows added</caption>
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col" colspan="3">ALUOp</th>
                                        <th scope="col" colspan="6">Funct field</th>
                                        <th scope="col" rowspan="2" class="align-middle">Operation</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">ALUOp2</th>
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
                                        <td>0</td>
                                        <td>0</td>
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
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>

                                        <td>X</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>

                                        <td>0010</td>
                                    </tr>
                                    <tr>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>

                                        <td>X</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>

                                        <td>0110</td>
                                    </tr>
                                    <tr>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>

                                        <td>X</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>

                                        <td>0000</td>
                                    </tr>
                                    <tr>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>

                                        <td>X</td>
                                        <td>X</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>1</td>

                                        <td>0001</td>
                                    </tr>
                                    <tr>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>

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
                                        <td>0</td>
                                        <td>0</td>

                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>

                                        <td>0000 (and for andi)</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td>1</td>
                                        <td>0</td>
                                        <td>1</td>

                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>X</td>

                                        <td>0001 (or for ori)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



