    <img id="idle-datapath" src ='tool/datapath/single-cycle-sb.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-store-byte"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath of instruction &lsquo;sb&rsquo; &#12299;</p>

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
                        <li class="list-group-item">Instruction name: Load byte unsigned / lbu &#36;rt, imm(&#36;rs)
                        </li>
                        <li class="list-group-item">Operation: M[R[rs] + SignExtImm](7:0) = R[rt](7:0)</li>
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
                                        <td colspan="11">Main control</td>
                                        <td rowspan="2" class="align-middle">ALU control</td>
                                    </tr>
                                    <tr>
                                        <td>sb</td>
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
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>X</td>
                                        <td>X</td>
                                        <td>0010</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item"> Execution flow <br> &#129170;
                            <small class="fst-italic fw-light">Note that this is for reference purpose and these steps are not necessarily happening in this exact order.</small>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item border-0">Fetch instruction and increment PC.</li>
                                <li class="list-group-item border-0">Obtain base register (Read data 1) and data (Read data 2) from register file.</li>
                                <li class="list-group-item border-0">Perform addition of register value with sign-extended immediate
                                                                     operand in ALU, use this result as address for data memory.</li>
                                <li class="list-group-item border-0">Write 8 least significant bits of the data obtained from (Read data 2) into memory address.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
                <div id="ext-explanation" class="mb-5">
                    <h5 class="fw-bold">Extension explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">This instruction&rsquo;s main operation, which is access and write a byte to memory,
                        is executed inside the Data memory unit. The detail modification of this unit shall not be discussed
                        here, as we focus on the datapath only. Thus, only one control line &lsquo;sb&rsquo; is needed, it will
                        send a signal directly to the Data memory, specifying that it should access and modify a byte instead of a word
                        like in the &lsquo;sw&rsquo; instruction.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



