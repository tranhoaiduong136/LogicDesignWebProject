    <img id="idle-datapath" src ='tool/datapath/single-cycle-lbu.png' class='img-fluid mx-auto d-block mb-5' alt="mips-single-cycle-datapath-load-byte-unsigned"/>
    <p class="d-flex flex-column justify-content-center text-center py-5 my-5">&#12298; MIPS Single-cycle Datapath of instruction &lsquo;lbu&rsquo; &#12299;</p>

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
                        <li class="list-group-item">Operation: R[rt] = {24’b0, M[R[rs] + SignExtImm](7:0)}</li>
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
                                        <td>lbu</td>
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
                                        <td>1</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>0010</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item"> Execution flow <br> &#129170;
                            <small class="fst-italic fw-light">Note that this is for reference purpose and these steps are not necessarily happening in this exact order.</small>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item border-0">Fetch instruction and increment PC.</li>
                                <li class="list-group-item border-0">Obtain base register operand (Read data 1) from register file.</li>
                                <li class="list-group-item border-0">Perform addition of register value with sign-extended immediate operand in ALU.</li>
                                <li class="list-group-item border-0">Save the last two bits from the newly obtained addition value,
                                                                     replace them with 2b&rsquo;0 and use the result as address to access Data memory.</li>
                                <li class="list-group-item border-0">Use the previous two bits to determine which byte should be read.</li>
                                <li class="list-group-item border-0">Select output read from Data memory to be written to destination register.</li>
                                <li class="list-group-item border-0">Write back to destination register.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
                <div id="ext-explanation" class="mb-5">
                    <h5 class="fw-bold">Extension explanation</h5>
                    <ul class="list-group list-group-flush px-auto mx-auto">
                        <li class="list-group-item">To add this instruction to the set, we must keep in mind that the address
                        used to access the memory should be word-aligned. The 32-bit data value read from memory then can be supplied into
                        MUXs to determine the needed byte.
                        </li>
                        <li class="list-group-item">Additional components include:
                            <ul>
                                <li>1 component that receives a 32-bit ALU result as input, and produces two last bits
                                of the input and a 32-bit value (which is actually the input with two last bits replaced by 0).</li>
                                <li>1 4-to-1 MUX to choose which byte to be read, controlled by the two-bit output of the above component.</li>
                                <li>1 zero-extend component to concatenate 24b&rsquo;0 to the 8-bit data read from memory.<br>
                                <small class="fw-light">Note: This component can be replaced by a sign-extend one to deal with the &lsquo;lb&rsquo; instruction.</small>
                                </li>
                                <li>1 2-to-1 MUX to determine whether a word or a byte read from memory should be written back to the destination register,
                                this MUX must supply its result to the initial MUX driven by MemtoReg.</li>
                                <li>1 control line &lsquo;lbu&rsquo; to control the 2-to-1 MUX.</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



